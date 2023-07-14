<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\VacationTypeRequest;
use App\Http\Services\Dashboard\VacationTypeService;
use App\Models\VacationType;

class VacationTypeController extends Controller
{
    public $vacationTypeService;

    public function __construct(VacationTypeService $vacationTypeService)
    {
        $this->vacationTypeService = $vacationTypeService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view_vacation_types');
        if(request()->ajax()){
            return response()->json($this->vacationTypeService->index());
        }
        return view('dashboard.vacation-types.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create_vacation_types');
        return view('dashboard.vacation-types.create');
    }

    /**
     * @param VacationTypeRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(VacationTypeRequest $request)
    {
        $this->authorize('create_vacation_types');
        $this->vacationTypeService->store($request->validated());
    }

    /**
     * @param VacationType $vacationType
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(VacationType $vacationType)
    {
        $this->authorize('update_vacation_types');
        return view('dashboard.vacation-types.edit',compact('vacationType'));
    }

    /**
     * @param VacationTypeRequest $request
     * @param VacationType        $vacationType
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(VacationTypeRequest $request, VacationType $vacationType)
    {
        $this->authorize('update_vacation_types');
        $this->vacationTypeService->update($request->validated(),$vacationType);
    }

    /**
     * @param VacationType $vacationType
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy (VacationType $vacationType)
    {
        $this->authorize('delete_vacation_types');
        if(request()->ajax()){
            $this->vacationTypeService->destroy($vacationType);
        }
    }
}
