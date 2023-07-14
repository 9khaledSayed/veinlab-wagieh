<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\LaboratoryRequest;
use App\Http\Services\Dashboard\{LaboratoryService, MainAnalysisService};
use App\Models\{Invoice, Laboratory,MainAnalysis};
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    /**
     * LaboratoryController constructor.
     * @param LaboratoryService   $laboratoryService
     * @param MainAnalysisService $mainAnalysisService
     */
    public $mainAnalysis;
    public function __construct(private LaboratoryService $laboratoryService, private MainAnalysisService $mainAnalysisService,MainAnalysis $mainAnalysis)
    {
        $this->mainAnalysis  = $mainAnalysis;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize('view_laboratories');
        if ($request->ajax()) {
            return response()->json($this->laboratoryService->index());
        }
        return view('dashboard.laboratory.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create_laboratories');
        $mainAnalyses = $this->mainAnalysis->select('id','general_name')->get();
        return view('dashboard.laboratory.create',compact('mainAnalyses'));
    }

    /**
     * @param LaboratoryRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(LaboratoryRequest $request)
    {
        $this->authorize('create_laboratories');
        $this->laboratoryService->store($request->validated());
    }

    /**
     * @param Laboratory $laboratory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Laboratory $laboratory)
    {
        $this->authorize('view_laboratories');

        $invoices = Invoice::whereRaw('CAST(purchases AS CHAR(10000)) LIKE \'%"laboratory_id";s:%:"'.$laboratory->id.'"%\'')->get();


        return view('dashboard.laboratory.show',compact('laboratory','invoices'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $this->authorize('update_laboratories');
        $laboratories = Laboratory::findOrFail($id);
        $mainAnalyses = $this->mainAnalysis->select('id','general_name')->get();
        $laboratoriesMainAnalysis = $this->laboratoryService->getMainAnalysis($laboratories);
        return view('dashboard.laboratory.edit', compact('laboratories','mainAnalyses','laboratoriesMainAnalysis'));

    }

    /**
     * @param LaboratoryRequest $request
     * @param                   $id
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(LaboratoryRequest $request, $id) {
        $laboratories = Laboratory::findOrFail($id);

        $this->authorize('update_laboratories');
        $this->laboratoryService->update($request->validated(), $laboratories);
    }

    /**
     * @param Request $request
     * @param         $id
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize('delete_laboratories');
        $laboratories = Laboratory::findOrFail($id);
        if($request->ajax()){
            $this->laboratoryService->delete($laboratories);
        }
    }
}
