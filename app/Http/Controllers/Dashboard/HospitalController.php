<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\HospitalRequest;
use Illuminate\Http\Request;
use App\Http\Services\Dashboard\{HospitalServices, MainAnalysisService};

class HospitalController extends Controller
{
    public function __construct(private HospitalServices $hospitalServices, private MainAnalysisService $mainAnalysisService,)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {
       $this->authorize('view_hospitals');
        if ($request->ajax()) {
            return response()->json($this->hospitalServices->index());
        }
        return view('dashboard.hospitals.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create_hospitals');
        $mainAnalyses = $this->mainAnalysisService->getAll();
        return view('dashboard.hospitals.create', compact('mainAnalyses'));
    }

    /**
     * @param HospitalRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(HospitalRequest $request)
    {
        $this->authorize('create_hospitals');
        $this->hospitalServices->store($request->validated());
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($id)
    {
        $this->authorize('show_hospitals');
        $hospital = $this->hospitalServices->find($id);
        return view('dashboard.hospitals.show', compact('hospital'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $this->authorize('update_hospitals');
        $hospital = $this->hospitalServices->find($id);
        $mainAnalyses = $this->mainAnalysisService->getAll();
        $hospitalMainAnalysis = $this->hospitalServices->getMainAnalysis($hospital);
        return view('dashboard.hospitals.edit', compact('hospital', 'mainAnalyses', 'hospitalMainAnalysis'));
    }

    /**
     * @param HospitalRequest $request
     * @param                 $id
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(HospitalRequest $request, $id)
    {
        $this->authorize('update_hospitals');
        $this->hospitalServices->update($request->validated(), $id);
    }

    /**
     * @param Request $request
     * @param         $id
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize('delete_hospitals');
        if($request->ajax()){
            $this->hospitalServices->destroy($id);
        }
    }
}
