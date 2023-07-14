<?php

namespace App\Http\Services\Dashboard;

use App\Enums\InvoiceTransfer;
use App\Http\Classes\Points\AssignPoints;
use App\Models\{Doctor, Hospital, Invoice, Laboratory, MainAnalysis, Package, Patient, PromoCode, Quality, SubAnalysis, WaitingLab};
use DB;
use PDF;


class InvoiceService
{
    /**
     * @return array
     */
    public function index()
    {
        return getModelData(model: new Invoice(), relations: ['patient' => ['id', 'name_ar', 'name_en']]);
    }

    /**
     * @param $hospitalId
     * @return mixed
     */
    public function getMainAnalyzeWithHospital($hospitalId)
    {
        $hospital = Hospital::find($hospitalId);
        //get hospital main analysis and main analyse without hospital main analyse and marge them together
        //hospital main analyse
        $hospitalAnalysis = $hospital->mainAnalysis->map(function ($analyze) {
            $analyze['hospital_price'] = $analyze->pivot->price;
            unset($analyze['pivot']);
            return $analyze;
        });
        //main analysis without hospital main analysis
        $mainAnalysis = MainAnalysis::whereNotIn('id', $hospitalAnalysis->pluck('id'))->get();
        // merge two collections
        return $hospitalAnalysis->merge($mainAnalysis);

    }

    /**
     * @param $laboratoryId
     * @return mixed
     */
    public function getMainAnalyzeWithLaboratory($laboratoryId)
    {
        $laboratory = Laboratory::find($laboratoryId);
        //get hospital main analysis and main analyse without hospital main analyse and marge them together
        //hospital main analyse
        $laboratoryAnalysis = $laboratory->mainAnalysis->map(function ($analyze) {
            $analyze['hospital_price'] = $analyze->pivot->price;
            unset($analyze['pivot']);
            return $analyze;
        });
        //main analysis without hospital main analysis
        $mainAnalysis = MainAnalysis::whereNotIn('id', $laboratoryAnalysis->pluck('id'))->get();
        // merge two collections
        return $laboratoryAnalysis->merge($mainAnalysis);

    }

    /**
     * @param array $data
     */
    public function store(array $data)
    {

        // tableData if analyse (if type 0) store it main_analysis column
        // tableData if package (if type 1) store it packages column
        [$packageIds, $mainAnalyseIds, $purchases] = $this->_extractedTable($data['data_table']);

        //add home visit to purchases
        if ($data['is_home_fees'] == 'true') {
            $purchases['Home Visit Fees'] = [
                'price'    => settings()->get('home_visit_fees'),
                'code'     => '-',
                'discount' => 0
            ];
        }
        $patient_vists = Patient::find($data['patient_id']);


        DB::beginTransaction();


        //create invoice with total_cost discount
        $invoice = Invoice::create([
            'employee_id'     => auth()->id(),
            'patient_id'      => $data['patient_id'],
            'doctor_id'       => $this->_getValue($data, 'doctor_id'),
            'hospital_id'     => $this->_getValue($data, 'hospital_id'),
            'transfer'        => $data['transfer'],
            'promo_code_id'   => $data['has_promo_code'] == 'true' ? $this->_getValue($data, 'promo_code_id') : null,
            'purchases'       => serialize($purchases),
            'tax'             => $data['tax'],
            'status'          => 1,
            'main_analysis'   => serialize($mainAnalyseIds),
            'packages'        => serialize($packageIds),
            'total_price'     => $data['total_price'],
            'total_cost'      => $data['total_cost'],
            'discount'        => $data['discount'] ?? 0,
            'pay_method'      => $data['pay_method'],
            'payment_type'    => $data['payment_type'],
            'amount_paid'     => $data['amount_paid'],
            'invoice_is_free' => $data['invoice_is_free'],
        ]);

        $patient_vists->update([
            'visit_number' => $patient_vists->visit_number + 1
        ]);

        DB::commit();


        //store main analysis to waiting labs with invoice id and patient id hospital_id
        $this->generateWaitingLabs($mainAnalyseIds, $packageIds, $invoice->id, $data['patient_id']);
        $patient = Patient::find($data['patient_id']);

        if ($data['user_points_used'] != null && $data['user_points_used'] > 0) {
            AssignPoints::minusPatient(intval($data['user_points_used']), $patient, $invoice->id);
        }
        //assign points
        if ($data['has_promo_code'] == 'true') {
            $promoCode = PromoCode::find($data['promo_code_id']);
            $assignPoints = new AssignPoints($data['total_price'], $promoCode);
            $assignPoints->toPatient($patient, $invoice->id);
        }

        //assign transfer
        $this->assignTransfer($data);

    }

    /**
     * @param array $data_table
     * @return array
     */
    private function _extractedTable(array $data_table) : array
    {
        $packageIds = [];
        $mainAnalyseIds = [];
        $purchases = [];

        foreach ($data_table as $row) {
            $price = null;
            if (array_key_exists('package_id', $row) && $row['package_id']) {
                $packageIds[] = $row['package_id'];
            } else {
                $mainAnalyseIds[] = $row['id'];
            }
            if (array_key_exists('laboratory_price', $row) && $row['laboratory_price'] != null && $row['laboratory_price'] != '') {
                $price = $row['laboratory_price'];
            } else {
                $price = $row['price'];
            }


            $purchases[$row['name']] = [
                'price'         => $price,
                'code'          => $row['code'],
                'discount'      => $row['discount'],
                'laboratory_id' => $row['selectedLaboratoryId'] ?? ''
            ];

        }
        return [$packageIds, $mainAnalyseIds, $purchases];
    }

    /**
     * @param array $data
     * @param       $key
     * @return bool
     */
    public function _getValue(array $data, string $key) : mixed
    {
        return array_key_exists($key, $data) && $data[$key] ? $data[$key] : null;
    }

    /**
     * @param int $patientId
     * @return array
     */
    public function getPatientInfo(int $patientId) : array
    {
        // patient model
        $patient = Patient::findOrFail($patientId);

        return [
            'tax'    => $this->_getTax('sa'),
            'points' => $this->_getPoints($patient)
        ];
    }

    /**
     * @param string $nationalityLabel
     * @return int
     */
    private function _getTax(string $nationalityLabel) : int
    {
        return settings()->get('tax');
    }

    /**
     * @param Patient $patient
     * @return int
     */
    private function _getPoints(Patient $patient) : int
    {
        return $patient->total_points_count;
    }

    /**
     * @param      $mainAnalysisIds
     * @param      $packagesIds
     * @param      $invoiceId
     * @param      $patientId
     * @param null $hospitalId
     */
    private function generateWaitingLabs($mainAnalysisIds, $packagesIds, $invoiceId, $patientId, $hospitalId = null)
    {
        $packagesAnalysis = Package::with('mainAnalysis')->whereIn('id', $packagesIds)->get()->map(function ($package) {
            return $package->mainAnalysis->pluck('id');
        })->flatten();

        foreach ($mainAnalysisIds as $analysisId) {
            WaitingLab::create([
                'patient_id'       => $patientId,
                'main_analysis_id' => $analysisId,
                'invoice_id'       => $invoiceId
            ]);
        }

        foreach ($packagesAnalysis as $analysisId) {
            WaitingLab::create([
                'patient_id'       => $patientId,
                'main_analysis_id' => $analysisId,
                'invoice_id'       => $invoiceId
            ]);
        }

        //     Employee::first()->notify(new WaitingLabNotification());
        //   pushNotification();
    }

    /**
     * @param $mainAnalysisIds
     * @param $packagesIds
     * @param $invoiceId
     */
    private function generateQuality($mainAnalysisIds, $packagesIds, $invoiceId)
    {
        $packagesAnalysis = Package::with('mainAnalysis')->whereIn('id', $packagesIds)->get()->map(function ($package) {
            return $package->mainAnalysis->pluck('id');
        })->flatten();

        $mainAnalysisIds = SubAnalysis::whereIn('main_analysis_id', $mainAnalysisIds)->get();
        foreach ($mainAnalysisIds as $sub) {
            Quality::create([
                'main_analysis_id' => $sub->main_analysis_id,
                'sub_analysis_id'  => $sub->id,
                'invoice_id'       => $invoiceId,
                'status'           => \App\Enums\QualityStatus::Issuing_Invoice->value
            ]);

            Quality::create([
                'main_analysis_id' => $sub->main_analysis_id,
                'sub_analysis_id'  => $sub->id,
                'invoice_id'       => $invoiceId,
                'status'           => \App\Enums\QualityStatus::Sample_Entry->value
            ]);
        }

        $packagesAnalysis = SubAnalysis::whereIn('main_analysis_id', $packagesAnalysis)->get();
        foreach ($packagesAnalysis as $analysisId) {
            Quality::create([
                'main_analysis_id' => $analysisId->main_analysis_id,
                'sub_analysis_id'  => $analysisId->id,
                'invoice_id'       => $invoiceId,
                'status'           => \App\Enums\QualityStatus::Issuing_Invoice->value
            ]);

            Quality::create([
                'main_analysis_id' => $analysisId->main_analysis_id,
                'sub_analysis_id'  => $analysisId->id,
                'invoice_id'       => $invoiceId,
                'status'           => \App\Enums\QualityStatus::Sample_Entry->value
            ]);
        }
    }

    /**
     * @param array $data
     */
    public function assignTransfer(array $data) : void
    {
        if ($data['transfer'] == InvoiceTransfer::DOCTOR->value)
        {
            $doctor = Doctor::find($data['doctor_id']);
            $DoctorMoney = $data['total_price'] * ($doctor->percentage / 100);
            $doctor->update([
                'wallet'          => $doctor->wallet + $DoctorMoney,
                'lifetime_wallet' => $doctor->lifetime_wallet + $DoctorMoney,
                'no_patients'     => $doctor->no_patients + 1
            ]);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function generateInvoicePdf($id)
    {
        $invoice = Invoice::findOrFail($id);

        $data = $this->getArr($invoice);
        $pdf = PDF::loadView('dashboard.templates.pdf.invoice', $data);
        return $pdf->inline($invoice->patient->fullname ?? 'FilePDF' . '.pdf');
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function generateBillPdf($id)
    {
        $invoice = Invoice::findOrFail($id);
        $data = $this->getArr($invoice);
        $pdf = PDF::loadView('dashboard.templates.pdf.bill', $data);
        return $pdf->stream($data['patientName'] . '.pdf');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function sendViaWhatsapp($id)
    {
        $invoice = Invoice::findOrFail($id);
        $patient = $invoice->patient;
        $invoice->approved = 1;
        $invoice->save();

        $messageResponseBody = $patient->sendWhatsappMessage(__('Message Invoice For whatsapp'));
        $fileResponseBody = $patient->sendWhatsappFile(route('dashboard.invoice.generate', $invoice->id));
        if ($messageResponseBody->success || $fileResponseBody->success) {
            return response(__('message send successfully'));
        } else {
            return response(__('something went wrong'), 404);
        }
    }

    /**
     * @param $invoice
     * @return array
     */
    public function getArr($invoice) : array
    {
        $data = [
            'invoice'     => $invoice,
            'patientName' => $invoice->patient->name,
            'patient'     => $invoice->patient,
            'nationality' => $invoice->patient->nationality->name ?? __('There is no nationality'),
            'hospital'    => $invoice->hospital->name ?? __('There is no hospital'),
            'doctor'      => $invoice->doctor->name ?? __('There is no doctor'),
            'employee'    => $invoice->employee->name ?? __('There is no employee'),
            'purchases'   => unserialize($invoice->purchases),
        ];
        return $data;
    }

}
