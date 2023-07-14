<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AllowanceTypeRequest;
use App\Http\Services\Dashboard\AllowanceTypeService;
use App\Models\AllowanceType;

class AllowanceTypeController extends Controller
{
    public $allowanceTypeService;

    /**
     * AllowanceTypeController constructor.
     * @param AllowanceTypeService $allowanceTypeService
     */
    public function __construct(AllowanceTypeService $allowanceTypeService)
    {
        $this->allowanceTypeService = $allowanceTypeService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view_allowance_types');
        if(request()->ajax()){
            return response()->json($this->allowanceTypeService->index());
        }
        return view('dashboard.allowance-types.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create_allowance_types');
        return view('dashboard.allowance-types.create');
    }

    /**
     * @param AllowanceTypeRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(AllowanceTypeRequest $request)
    {
        $this->authorize('create_allowance_types');
        $this->allowanceTypeService->store($request->validated());
    }

    /**
     * @param AllowanceType $allowanceType
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(AllowanceType  $allowanceType)
    {
        $this->authorize('update_allowance_types');
        return view('dashboard.allowance-types.edit',compact('allowanceType'));
    }

    /**
     * @param AllowanceTypeRequest $request
     * @param AllowanceType        $allowanceType
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(AllowanceTypeRequest $request, AllowanceType  $allowanceType)
    {
        $this->authorize('update_allowance_types');
        $this->allowanceTypeService->update($request->validated(),$allowanceType);
    }

    /**
     * @param AllowanceType $allowanceType
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(AllowanceType  $allowanceType)
    {
        $this->authorize('delete_allowance_types');
        if(request()->ajax()){
            $this->allowanceTypeService->destroy($allowanceType);
        }
    }
}
