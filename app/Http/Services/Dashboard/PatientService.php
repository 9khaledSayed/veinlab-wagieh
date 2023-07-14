<?php

namespace App\Http\Services\Dashboard;
use App\Http\Classes\PromoCode\UserPromoCodeClass;
use Illuminate\Support\Facades\{DB, Hash};
use App\Models\Patient;
use Barryvdh\Snappy\Facades\SnappyPdf;

class PatientService
{
    /**
     * @return array
     */
    public function index()
    {
      return getModelData( model: new Patient() );
    }

    /**
     * @param $request
     * @param $patient
     * @return mixed
     */
    public function show($request, $patient){

       $patient = $patient->load(['invoice'=>function($q) use ($request){
           if($request->from && $request->to){
            $q->whereBetween(DB::raw('Date(created_at)'),[$request->from , $request->to]);
        }
       }]);


       $mainAnalysis = $patient->load(['waitingLabs' => function($waitingLabs) use ($request, $patient) {
           $waitingLabs->groupBy('main_analysis_id')->with(['mainAnalysis' => function($mainAnalysis) use ($request, $patient) {
               $mainAnalysis->with(['subAnalysis' => function($subAnalysis) use ($patient) {
               }]);
           }]);

           if ($request->analysis){
               $waitingLabs->whereIn('main_analysis_id', $request->analysis)
                   ->OrwhereBetween('created_at', [$request->from, $request->to]);
           }
       }]);

       return $waitingLabs = $mainAnalysis->waitingLabs;

    }

    /**
     * @param $data
     */
    public function store($data){
      $data['password'] = Hash::make($data['phone']);
      $patient = Patient::create($data);

      //create his promoCode
       (new UserPromoCodeClass())->generatePromoCode($patient);
    }

    /**
     * @param $data
     * @param $patient
     */
    public function update($data,$patient){

      if(is_numeric($patient)){
         $patient = Patient::findOrFail($patient);
         $patient->update($data);
      }else{
         $patient->update($data);
      }
    }

    /**
     * @param $patient
     */
    public function delete($patient){
        if(is_numeric($patient)){
            $patient = Patient::findOrFail($patient);
            $patient->delete();
        }else{
            $patient->delete();
        }
    }

    /**
     * @return string|\Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \OpenSpout\Common\Exception\IOException
     * @throws \OpenSpout\Common\Exception\InvalidArgumentException
     * @throws \OpenSpout\Common\Exception\UnsupportedTypeException
     * @throws \OpenSpout\Writer\Exception\WriterNotOpenedException
     */
    public function exportExcel(){
      $patients = Patient::get()->map(function($patient){
         return [
            '#' => $patient->id,
            __('Name arabic') => $patient->name_ar,
            __('Name english') => $patient->name_en,
            __('Id number') => $patient->id_number,
            __('Phone') => $patient->phone,
            __('Email') => $patient->email,
            __('Gender') => __($patient->gender),
            __('Nationality') => $patient->nationality->name,
            __('Age') => $patient->age,
            __('City') => $patient->city,
            __('Address') => $patient->address,
            __('Diseases') => $patient->diseases,
            __('Created at') => $patient->created_at,
         ];
      });
    return (new \Rap2hpoutre\FastExcel\FastExcel($patients))->download(__('Patients').'.xlsx');
    }

    /**
     * @return mixed
     */
    public function getAll(){
        return Patient::get();
    }

    /**
     * @param       $search
     * @param false $isSelector
     * @return mixed
     */
    public function search($search, $isSelector = false) {
       $search = '%' . $search . '%';
       $query = Patient::whereLike('name', $search)
           ->whereLike('phone', $search)
           ->whereLike('email', $search);

       if($isSelector) $query = $query->select(['id', DB::raw('CONCAT(patients.name, " - ", patients.email, " - ", patients.phone) as text' )]);
       return $query->limit(10)->get();
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function printInvoice($id)
    {
       $patient = Patient::findOrFail($id);

       $data   = [
           'patient' => $patient
       ];
       $pdf = SnappyPdf::loadView('dashboard.patients.print-invoice.print-invoice',['patient'=>$patient]);

       return $pdf->stream('FilePDF.pdf');
    }

}
