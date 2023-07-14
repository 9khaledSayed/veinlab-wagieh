<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PatientRequest;
use App\Http\Services\Dashboard\{MainAnalysisService, PatientService, NationalityService};
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Nationality;
use Mpdf\Tag\Sub;

class PatientController extends Controller
{
    public $patientService;
    public $nationalityService;
    public $nationality;

    public $mainAnalysisService;
    public function __construct(PatientService $patientService, NationalityService $nationalityService, MainAnalysisService $mainAnalysisService,Nationality $nationality)
    {
        $this->patientService       = $patientService;
        $this->nationalityService   = $nationalityService;
        $this->mainAnalysisService  = $mainAnalysisService;
        $this->nationality          = $nationality;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request){

        $this->authorize('view_patients');
        if($request->ajax()){
             return response()->json($this->patientService->index());
        }
        return view('dashboard.patients.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(){
        $this->authorize('create_patients');
        $nationalities =  $this->nationality->select('id','name_ar','name_en','logo')->get();
        return view('dashboard.patients.create',compact('nationalities'));
    }

    /**
     * @param Patient $patient
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Patient $patient){
        $this->authorize('update_patients');
        $nationalities =  $this->nationality->select('id','name_ar','name_en','logo')->get();
        return view('dashboard.patients.edit',compact('patient','nationalities'));
    }

    /**
     * @param Request $request
     * @param Patient $patient
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Request $request, Patient $patient) {
        $this->authorize('show_patients');
        $waitingLabs         = $this->patientService->show($request, $patient);
        $requestAnalysis     = $request->analysis;
        $requestFrom         = $request->from;
        $requestTo           = $request->to;

        $mainAnalysis = $this->mainAnalysisService->getAll();
        return view('dashboard.patients.show',compact('waitingLabs',
                                                      'patient','mainAnalysis','requestAnalysis','requestFrom','requestTo'));
    }

    /**
     * @param PatientRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(PatientRequest $request){
        $this->authorize('create_patients');
        $this->patientService->store($request->validated());
    }

    /**
     * @param PatientRequest $request
     * @param Patient        $patient
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(PatientRequest $request,Patient $patient){
        $this->authorize('update_patients');
        $this->patientService->update($request->validated(),$patient);
    }

    /**
     * @param Request $request
     * @param Patient $patient
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request, Patient $patient)
    {
        $this->authorize('delete_patients');

        if($request->ajax())
        {
            $this->patientService->delete($patient);
        }
    }

    /**
     * @return string|\Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function exportExcel(){
        $this->authorize('export_excel_patients');
        return $this->patientService->exportExcel();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function search(Request $request){
        $this->authorize('view_patients');
        return $this->patientService->search($request->search ?? '');
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function printInvoice($id){
        return $this->patientService->printInvoice($id);
    }

}
