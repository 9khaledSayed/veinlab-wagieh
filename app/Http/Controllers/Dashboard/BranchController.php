<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BranchRequest;
use App\Http\Services\Dashboard\BranchService;
use App\Models\Branch;

class BranchController extends Controller
{
    public $branchService;

    /**
     * BranchController constructor.
     * @param BranchService $branchService
     */
    public function __construct(BranchService $branchService)
    {
        $this->branchService = $branchService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view_branches');
        if(request()->ajax()){
            return response()->json($this->branchService->index());
        }
        return view('dashboard.branches.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create_branches');
        return view('dashboard.branches.create');
    }

    /**
     * @param BranchRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(BranchRequest $request)
    {
        $this->authorize('create_branches');
        $this->branchService->store($request->validated());
    }

    /**
     * @param Branch $branch
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Branch $branch)
    {
        $this->authorize('update_branches');
        return view('dashboard.branches.edit',compact('branch'));
    }

    /**
     * @param BranchRequest $request
     * @param Branch        $branch
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(BranchRequest $request, Branch $branch)
    {
        $this->authorize('update_branches');
        $this->branchService->update($request->validated(), $branch);
    }

    /**
     * @param Branch $branch
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Branch $branch)
    {
        $this->authorize('delete_branches');
        if(request()->ajax()){
            $this->branchService->delete($branch);
        }
    }
}
