<?php

namespace App\Http\Services\Dashboard;

use App\Models\{WaitingLab, Note, Result, Invoice};
use App\Enums\GenderType;
use App\Notifications\ResultReady;
use DB;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Carbon\Carbon;
use Alkoumi\LaravelHijriDate\Hijri;

class ResultService
{
    /**
     * @return array
     */
    public function index()
    {
        return getModelData( model: new Result(),
            relations: ['patient' => ['id','name_ar'] , 'WaitingLab' => ['id','invoice_id']],
            searchingColumns: ['patient.name_ar']
        );
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store($data){

        $waitingLab    = WaitingLab::with(['mainAnalysis', 'patient','invoice','mainAnalysis.subAnalysis'])->find($data->waiting_lab_id);
        $subAnalysis   = $waitingLab->mainAnalysis->subAnalysis;
        $mainAnalysis  = $waitingLab->mainAnalysis;
        $i             = 0;

        DB::beginTransaction();
            foreach($subAnalysis as $sub){


                if(isset($data->{'result_' . $sub->id})){
                    Result::UpdateOrcreate(
                        [
                            'waiting_lab_id'    => $waitingLab->id,
                            'sub_analysis_id'   => $sub->id
                        ],
                        [
                            'waiting_lab_id'    => $waitingLab->id,
                            'sub_analysis_id'   => $sub->id,
                            'classification'    => $sub->classification,
                            'patient_id'        => $waitingLab->patient->id,
                            'main_analysis_id'  => $mainAnalysis->id,
                            'result'            => $data->{'result_' . $sub->id},
                            'delayed'           => $data->{'delayed_' . $sub->id}
                        ]);
                    $i++;
                }
            }

            if($i === $subAnalysis->count())
            {
                $waitingLab->update([
                    'status'    => 2,
                    'result'    => 2
                ]);
            }

            if(isset($data->lab_notes) || isset($waitingLab->notes))
            {
                Note::UpdateOrcreate(
                    [
                        'main_analysis_id' => $mainAnalysis->id,
                        'waiting_lab_id'   => $waitingLab->id,
                    ],
                    [
                        'lab_notes'  => $data->lab_notes,
                    ]);

            }elseif(isset($waitingLab->notes)){

                $waitingLab->notes->update(
                [
                    'lab_notes'  => null,
                ]);
            }
            $waitingLab->invoice->update([
                'result_created' => 1
            ]);

            $waitingLab->update($data->validated());

        DB::commit();

        return redirect(route('dashboard.waiting-labs.index'));

    }

    /**
     * @param $data
     * @param $waitingLab_id
     */
    public function update($data,$waitingLab_id){

        DB::beginTransaction();

            $waitingLab    = WaitingLab::with(['mainAnalysis','results', 'patient', 'notes'])->find($waitingLab_id);
            $mainAnalysis  = $waitingLab->mainAnalysis;
            $i             = $waitingLab->results->count();
            $sub_analysis  = $mainAnalysis->subAnalysis;


            foreach ($sub_analysis as $sub){
                $result = null;
                if($waitingLab->results->map->subAnalysis->contains($sub)){
                    $result = $waitingLab->results->where('sub_analysis_id', $sub->id)->first();
                }

                if(isset($result) && !isset($data->{'result_' . $sub->id}))
                {
                    $result->delete();
                    --$i;
                } elseif (isset($data->{'result_' . $sub->id})) {
                    Result::UpdateOrcreate(
                        [
                            'waiting_lab_id'    => $waitingLab->id,
                            'sub_analysis_id'   => $sub->id
                            ],
                            [
                            'waiting_lab_id'    => $waitingLab->id,
                            'sub_analysis_id'   => $sub->id,
                            'classification'    => $sub->classification,
                            'patient_id'        => $waitingLab->patient->id,
                            'main_analysis_id'  => $mainAnalysis->id,
                            'result'            => $data->{'result_' . $sub->id},
                            'delayed'           => $data->{'delayed_' . $sub->id}
                        ]);
                }
            }

                if(isset($data->lab_notes) || isset($waitingLab->notes)){
                    Note::UpdateOrcreate(
                    [
                        'main_analysis_id' => $mainAnalysis->id,
                        'waiting_lab_id'   => $waitingLab->id,
                    ],
                    [
                        'lab_notes'  => $data->lab_notes,
                    ]);
                }elseif(isset($waitingLab->notes)){
                    $waitingLab->notes->update([
                        'lab_notes'  => null,
                    ]);
                }

                if($i != $sub_analysis->count()){
                    $waitingLab->update([
                        'status'    => 1,
                        'result'    => 1
                    ]);
                }

            $waitingLab->update($data->validated());

        DB::commit();

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function sendViaWhatsapp($id)
    {
        $result           = Result::findOrFail($id);
        $patient          = $result->patient;

        $messageResponseBody = $patient->sendWhatsappMessage(__('Message Invoice For whatsapp'));
        $fileResponseBody    = $patient->sendWhatsappFile(route('dashboard.result.print', $result->id));
        if ($messageResponseBody->success || $fileResponseBody->success){
            return response(__('message send successfully'));
        } else {
            return response(__('something went wrong'), 404);
        }
    }

    public function sendViaEmail($id) {
        $invoice = Invoice::findOrFail($id);
        $patient = $invoice->patient;
        $patient->notify(new ResultReady($patient, $invoice->id, ['mail']));

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendViaWebNotification($id)
    {
        $invoice = Invoice::findOrFail($id);

        $patient = $invoice->patient;
        $patient->notify(new ResultReady($patient, $invoice->id, ['database']));
        pushNotification($patient);

        return response()->json([
            'success' => true
        ]);
    }

    public function approve($request)
    {
        DB::beginTransaction();


        $invoice_id = $request->invoice_id;
        $invoice = Invoice::find($invoice_id);
        $invoice->doctor = auth()->user()->name;
        $invoice->approved = 1;
        $invoice->approved_date = Carbon::now();
        $invoice->save();



        $invoice = Invoice::find($invoice_id)->load(['waitingLabs'=>function($query){
            $query->where('status',2);
        }]);

          foreach($invoice->waitingLabs as $waitingLab){
            $waitingLab->result = 3 ;
            $waitingLab->save() ;
          }


        DB::commit();

    }

    public function printResult($id,$request)
    {
        $result = Result::findOrFail($id);

        $data   = [
            'result' => $result
        ];

        if($request->lang == "ar"){
            $pdf = SnappyPdf::loadView('dashboard.results.print_single_result.print_result',$data);
        }else{
            $pdf = SnappyPdf::loadView('dashboard.results.print_single_result.print_result_en',$data);
        }
        return $pdf->stream('FilePDF.pdf');
    }

    public function printResults($id,$request)
    {
        $invoice = Invoice::findOrFail($id)->load('patient','waitingLabs');
        $data    = [
            'invoice' => $invoice
        ];

        if($request->lang == "ar"){
            $pdf = SnappyPdf::loadView('dashboard.results.print_results.print_results',$data);
        }else{
            $pdf = SnappyPdf::loadView('dashboard.results.print_results.print_results_en',$data);
        }

        return $pdf->stream($invoice->patient->fullname ?? 'FilePDF' .'.pdf');

    }


}
