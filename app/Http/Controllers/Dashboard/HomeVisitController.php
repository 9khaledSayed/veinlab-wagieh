<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Dashboard\HomeVisitService;
use App\Http\Requests\Dashboard\HomeVisit\{StoreRequest, UpdateRequest};
use App\Models\HomeVisit;

class HomeVisitController extends Controller
{
    public $homeVisitService;

    /**
     * HomeVisitController constructor.
     * @param HomeVisitService $homeVisitService
     */
    public function __construct(HomeVisitService $homeVisitService){
        $this->homeVisitService = $homeVisitService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request){
        $this->authorize('view_home_visits');
        if($request->ajax()){
             return response()->json($this->homeVisitService->index());
        }
        return view('dashboard.home-visits.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(){
        $this->authorize('create_home_visits');
        return view('dashboard.home-visits.create');
    }

    /**
     * @param HomeVisit $homeVisit
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(HomeVisit $homeVisit){

        $this->authorize('update_home_visits');
        return view('dashboard.home-visits.edit',compact('homeVisit'));
    }

    /**
     * @param StoreRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreRequest $request){
        $this->authorize('create_home_visits');
        $this->homeVisitService->store($request->validated());
    }

    /**
     * @param UpdateRequest $request
     * @param HomeVisit     $homeVisit
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateRequest $request,HomeVisit $homeVisit){
        $this->authorize('update_home_visits');
        $this->homeVisitService->update($request->validated(),$homeVisit);
    }

    /**
     * @param Request   $request
     * @param HomeVisit $homeVisit
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request, HomeVisit $homeVisit)
    {
        $this->authorize('delete_home_visits');
        if($request->ajax())
        {
            $this->homeVisitService->delete($homeVisit);
        }
    }

    /**
     * @return string|\Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function exportExcel(){
        $this->authorize('export_excel_home_visits');
        return $this->homeVisitService->exportExcel();
    }

}
