<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Result\{StoreRequest, UpdateRequest};
use App\Http\Services\Dashboard\ResultService;
use Illuminate\Http\Request;
use App\Models\{WaitingLab, Invoice};


class ResultController extends Controller
{
    public $resultService;

    public function __construct(ResultService $resultService)
    {
        $this->resultService = $resultService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {

        $this->authorize('view_results');
        if ($request->ajax()) {
            return response()->json($this->resultService->index());
        }
        return view('dashboard.results.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Request $request)
    {
        $this->authorize('create_results');
        $waitingLab = WaitingLab::with(['results', 'mainAnalysis', 'mainAnalysis.subAnalysis'])->find($request->waitingLabId);

        return view('dashboard.results.create', compact('waitingLab'));
    }

    /**
     * @param StoreRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create_results');
        $this->resultService->store($request);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $invoice = Invoice::findOrFail($id)->load('patient', 'waitingLabs');
        return view('dashboard.results.show', compact('invoice'));
    }

    /**
     * @param WaitingLab $waitingLab
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(WaitingLab $waitingLab)
    {
        $this->authorize('show_results');
        return view('dashboard.results.edit', compact('waitingLab'));
    }

    /**
     * @param UpdateRequest $request
     * @param               $waitingLabId
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateRequest $request, $waitingLabId)
    {
        $this->authorize('update_results');

        $this->resultService->update($request, $waitingLabId);
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     */
    public function approve(Request $request)
    {
       return $this->resultService->approve($request);
    }

    /**
     * @param         $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function printResult($id,Request $request)
    {
       return $this->resultService->printResult($id, $request);
    }

    /**
     * @param         $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function printResults($id,Request $request)
    {
        return $this->resultService->printResults($id, $request);
    }

}
