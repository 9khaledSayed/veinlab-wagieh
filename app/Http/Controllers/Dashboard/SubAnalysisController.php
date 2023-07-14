<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SubAnalysisRequest;
use App\Http\Services\Dashboard\{SubAnalysisService, MainAnalysisService};
use App\Models\{SubAnalysis,MainAnalysis};


class SubAnalysisController extends Controller
{

    public $subAnalysisService;
    public $mainAnalysisService;
    public $mainAnalysis;

    public function __construct(SubAnalysisService $subAnalysisService,MainAnalysisService $mainAnalysisService,MainAnalysis $mainAnalysis)
    {
        $this->subAnalysisService = $subAnalysisService;
        $this->mainAnalysisService = $mainAnalysisService;
        $this->mainAnalysis  = $mainAnalysis;

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view_sub_analysis');
        if(request()->ajax()){
            return response()->json($this->subAnalysisService->index());
        }
        return view('dashboard.sub-analysis.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create_sub_analysis');
        $mainAnalysis = $this->mainAnalysis->select('id','general_name')->get();
        return view('dashboard.sub-analysis.create',compact('mainAnalysis'));
    }

    /**
     * @param SubAnalysisRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(SubAnalysisRequest $request)
    {
        $this->authorize('create_sub_analysis');
        $this->subAnalysisService->store($request->validated());
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $this->authorize('update_sub_analysis');
        $subAnalysis = SubAnalysis::findOrFail($id);
        $mainAnalysis = $this->mainAnalysis->select('id','general_name')->get();
        return view('dashboard.sub-analysis.edit',compact('subAnalysis','mainAnalysis'));
    }

    /**
     * @param SubAnalysisRequest $request
     * @param                    $id
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(SubAnalysisRequest $request, $id)
    {
        $this->authorize('update_sub_analysis');
        $this->subAnalysisService->update($request->validated(),$id);
    }

    /**
     * @param $id
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($id)
    {
        $this->authorize('delete_sub_analysis');
        if(request()->ajax()){
            $this->subAnalysisService->destroy($id);
        }
    }

    /**
     * @return string|\Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function exportExcel(){
        $this->authorize('export_excel_sub_analysis');
        return $this->subAnalysisService->exportExcel();
    }
}
