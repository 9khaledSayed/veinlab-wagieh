<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\DeductionAndAdditionRequest;
use App\Http\Services\Dashboard\DeductionAndAdditionService;
use App\Models\DeductionAndAddition;

class DeductionAndAdditionController extends Controller
{
    public $deductionAndAdditionService;

    /**
     * DeductionAndAdditionController constructor.
     * @param DeductionAndAdditionService $deductionAndAdditionService
     */
    public function __construct(DeductionAndAdditionService $deductionAndAdditionService)
    {
        $this->deductionAndAdditionService = $deductionAndAdditionService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view_deduction_and_additions');
        if(request()->ajax()){
            return response()->json($this->deductionAndAdditionService->index());
        }
        return view('dashboard.deduction-and-additions.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create_deduction_and_additions');
        return view('dashboard.deduction-and-additions.create');
    }

    /**
     * @param DeductionAndAdditionRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(DeductionAndAdditionRequest $request)
    {
        $this->authorize('create_deduction_and_additions');
        $this->deductionAndAdditionService->store($request->validated());
    }

    /**
     * @param DeductionAndAddition $deductionAndAddition
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(DeductionAndAddition  $deductionAndAddition)
    {
        $this->authorize('update_deduction_and_additions');
        return view('dashboard.deduction-and-additions.edit',compact('deductionAndAddition'));
    }

    /**
     * @param DeductionAndAdditionRequest $request
     * @param DeductionAndAddition        $deductionAndAddition
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(DeductionAndAdditionRequest $request, DeductionAndAddition  $deductionAndAddition)
    {
        $this->authorize('update_deduction_and_additions');
        $this->deductionAndAdditionService->update($request->validated(),$deductionAndAddition);
    }

    /**
     * @param DeductionAndAddition $deductionAndAddition
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(DeductionAndAddition  $deductionAndAddition)
    {
        $this->authorize('delete_deduction_and_additions');
        if(request()->ajax()){
            $this->deductionAndAdditionService->destroy($deductionAndAddition);
        }
    }
}
