<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\MainAnalysisRequest;
use App\Http\Services\Dashboard\{LaboratoryService, MainAnalysisService};
use App\Models\MainAnalysis;

class MainAnalysisController extends Controller
{
    public $mainAnalysisService;
    public $laboratoryService;

    /**
     * MainAnalysisController constructor.
     * @param MainAnalysisService $mainAnalysisService
     * @param LaboratoryService   $laboratoryService
     */
    public function __construct(MainAnalysisService $mainAnalysisService, LaboratoryService $laboratoryService)
    {
        $this->mainAnalysisService = $mainAnalysisService;
        $this->laboratoryService   = $laboratoryService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(){
        $this->authorize('view_main_analysis');
        if(request()->ajax()){
            return response()->json($this->mainAnalysisService->index());
        }
        return view('dashboard.main-analysis.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function laboratories(){


        $this->authorize('view_main_analysis');
        if(request()->ajax()){
            return response()->json($this->mainAnalysisService->laboratories());
        }
        return view('dashboard.main-analysis.laboratories');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(){
        $this->authorize('create_main_analysis');
        $laboratories = $this->laboratoryService->getAll();
        return view('dashboard.main-analysis.create',compact('laboratories'));
    }

    /**
     * @param MainAnalysisRequest $request
     */
    public function store(MainAnalysisRequest $request)
    {

        $this->mainAnalysisService->store($request->validated());
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($id)
    {
        $this->authorize('view_main_analysis');
        $analysis      = MainAnalysis::findOrFail($id);
        $hospitals     = $analysis->hospitals->take(7);
        $packages      = $analysis->packages->take(7);
        $waiting_labs  = $analysis->waitinglabs->take(7);

        return view('dashboard.main-analysis.show',compact('analysis','hospitals','packages','waiting_labs'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id){
        $this->authorize('update_main_analysis');
        $laboratories = $this->laboratoryService->getAll();
        $mainAnalysis = MainAnalysis::findOrFail($id);
        return view('dashboard.main-analysis.edit',compact('mainAnalysis','laboratories'));
    }

    /**
     * @param MainAnalysisRequest $request
     * @param                     $id
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(MainAnalysisRequest $request,$id){
        $this->authorize('update_main_analysis');
        $this->mainAnalysisService->update($request->validated(),$id);
    }

    /**
     * @param $id
     */
    public function destroy($id){
        if(request()->ajax()){
            $this->mainAnalysisService->destroy($id);
        }
    }

    /**
     * @return string|\Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \OpenSpout\Common\Exception\IOException
     * @throws \OpenSpout\Common\Exception\InvalidArgumentException
     * @throws \OpenSpout\Common\Exception\UnsupportedTypeException
     * @throws \OpenSpout\Writer\Exception\WriterNotOpenedException
     */
    public function exportExcel(){
        $this->authorize('export_excel_main_analysis');
        return $this->mainAnalysisService->exportExcel();
    }
}
