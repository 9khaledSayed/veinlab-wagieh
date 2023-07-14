<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Http\Services\Dashboard\SettingService;
use App\Http\Requests\Dashboard\Setting\{GeneralRequest, CompanyInformationRequest, TaxRequest, HomeVisitRequest};


class SettingController extends Controller
{

    public $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view_settings');
        return view('dashboard.general_settings');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function companyInfo(){
        $this->authorize('view_settings');
        return view('dashboard.company_info_settings');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function tax(){
        $this->authorize('view_settings');
        return view('dashboard.tax_settings');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function homeVisits(){
        $this->authorize('view_settings');
        return view('dashboard.home-visits-settings');
    }

    /**
     * @param GeneralRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(GeneralRequest $request )
    {
        $this->authorize('create_settings');

        $data = $request->validated();
        $this->settingService->modify($request,$data);
    }

    /**
     * @param CompanyInformationRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function storeCompanyInfo(CompanyInformationRequest $request )
    {
        $this->authorize('create_settings');

        $data = $request->validated();

        $this->settingService->modify($request,$data);
    }

    /**
     * @param TaxRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function storeTax(TaxRequest $request )
    {
        $this->authorize('create_settings');

        $data = $request->validated();
        $this->settingService->modify($request,$data);
    }

    /**
     * @param HomeVisitRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function storeHomeVisits(HomeVisitRequest $request )
    {
        $this->authorize('create_settings');

        $data = $request->validated();
        $this->settingService->modify($request,$data);
    }
}
