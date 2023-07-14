<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use App\Http\Requests\Dashboard\InsuranceCompany\{StoreRequest, UpdateRequest};
use App\Http\Services\Dashboard\InsuranceCompanyService;

class InsuranceCompanyController extends Controller
{
    public $insuranceCompanyService;
    public function __construct(InsuranceCompanyService $insuranceCompanyService){
        $this->insuranceCompanyService = $insuranceCompanyService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        if(request()->ajax()){
            return response()->json($this->insuranceCompanyService->index());
        }
        return view('dashboard.insurance-companies.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create_insurance_companies');
        return view('dashboard.insurance-companies.create');
    }

    /**
     * @param StoreRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create_insurance_companies');
        $this->insuranceCompanyService->store($request->validated());
    }

    /**
     * @param InsuranceCompany $insuranceCompany
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(InsuranceCompany $insuranceCompany)
    {
        $this->authorize('update_insurance_companies');
        return view('dashboard.insurance-companies.edit',compact('insuranceCompany'));
    }

    /**
     * @param UpdateRequest    $request
     * @param InsuranceCompany $insuranceCompany
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateRequest $request, InsuranceCompany $insuranceCompany)
    {
        $this->authorize('update_insurance_companies');
        $this->insuranceCompanyService->update($insuranceCompany,$request->validated());
    }

    /**
     * @return string|\Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function exportExcel(){
        $this->authorize('export_excel_patients');
        return $this->insuranceCompanyService->exportExcel();
    }

    /**
     * @param InsuranceCompany $insuranceCompany
     */
    public function destroy(InsuranceCompany $insuranceCompany)
    {
        if(request()->ajax()){
            $this->insuranceCompanyService->destroy($insuranceCompany);
        }
    }
}
