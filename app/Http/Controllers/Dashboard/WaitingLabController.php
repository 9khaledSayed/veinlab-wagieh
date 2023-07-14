<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Notifications\WaitingLabNotification;
use Illuminate\Http\Request;
use App\Http\Services\Dashboard\WaitingLabService;

class WaitingLabController extends Controller
{

    public $waitingLabService;

    public function __construct(WaitingLabService $waitingLabService) {
        $this->waitingLabService = $waitingLabService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize('view_waiting_labs');

        if($request->ajax()){
            return response()->json($this->waitingLabService->index($request));
        }
        return view('dashboard.waiting-labs.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function finishedAnalysis(Request $request)
    {
        $this->authorize('view_waiting_labs');
        if(request()->ajax()){

            return response()->json($this->waitingLabService->finished($request));
        }
        return view('dashboard.waiting-labs.finished');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function pendingAnalysis(Request $request)
    {
        $this->authorize('view_waiting_labs');

        if(request()->ajax()){
            return response()->json($this->waitingLabService->pending($request));
        }
        return view('dashboard.waiting-labs.pending');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function WaitingLabArchives(Request $request)
    {
        $this->authorize('view_waiting_labs');
        if ($request->ajax()){
            return response()->json($this->waitingLabService->WaitingLabArchives($request));
        }
        return view('dashboard.waiting-labs.archives');
    }

    /**
     * @param $id
     */
    public function disApprove($id){
        Employee::first()->notify(new WaitingLabNotification(__('Re-analysis and re-monitoring of the results were refused'),
                                                             'flaticon-warning-sign',
                                                             "warning",
                                                             route('dashboard.results.edit', $id)));
    }


    public function store(Request $request)
    {

    }



    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
