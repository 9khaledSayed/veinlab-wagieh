<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PackageRequest;
use App\Models\Package;
use App\Models\MainAnalysis;
use App\Http\Services\Dashboard\{MainAnalysisService, PackageService};

class PackageController extends Controller
{
    public $mainAnalysisService;
    public $packageService;
    public $mainAnalysis;
    public function __construct(MainAnalysisService $mainAnalysisService,PackageService $packageService,MainAnalysis $mainAnalysis){
        $this->mainAnalysisService = $mainAnalysisService;
        $this->packageService      = $packageService;
        $this->mainAnalysis        = $mainAnalysis;

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view_packages');
        if(request()->ajax()){
            return response()->json($this->packageService->index());
        }
        return view('dashboard.packages.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function seasonalPackages()
    {
        $this->authorize('view_packages');
        if(request()->ajax()){
            return response()->json($this->packageService->seasonalPackages());
        }
        return view('dashboard.packages.seasonal-packages');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create_packages');
        $mainAnalysis =  $this->mainAnalysis->select('id','general_name','price')->get();

        return view('dashboard.packages.create',compact('mainAnalysis'));
    }

    /**
     * @param PackageRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(PackageRequest $request)
    {
        $this->authorize('create_packages');
        $this->packageService->store($request->validated());
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show($id)
    {
        return redirect(back());
    }

    /**
     * @param Package $package
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Package $package)
    {
        $this->authorize('update_packages');
        $mainAnalysisSelected = $this->packageService->mainAnalysisSelect($package);
        $mainAnalysis =  $this->mainAnalysis->select('id','general_name','price')->get();
        return view('dashboard.packages.edit',compact('package','mainAnalysisSelected','mainAnalysis'));
    }

    /**
     * @param PackageRequest $request
     * @param Package        $package
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(PackageRequest $request, Package $package)
    {
        $this->authorize('update_packages');
        $this->packageService->update($package,$request->validated());

    }

    /**
     * @param Package $package
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Package $package)
    {
        $this->authorize('delete_packages');
        if(request()->ajax()){
            $this->packageService->destroy($package);
        }
    }
}
