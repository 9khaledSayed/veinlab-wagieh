<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\NationalityRequest;
use App\Models\Nationality;
use App\Http\Services\Dashboard\NationalityService;

class NationalityController extends Controller
{
    public $nationalityService;

    public function __construct(NationalityService $nationalityService)
    {
        $this->nationalityService = $nationalityService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        if(request()->ajax()){
            return response()->json($this->nationalityService->index(), 200);
        }
        return view('dashboard.nationalities.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create_nationalities');
        return view('dashboard.nationalities.create');
    }

    /**
     * @param NationalityRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(NationalityRequest $request)
    {
        $this->authorize('create_nationalities');
        $this->nationalityService->store($request->validated());
    }

    /**
     * @param Nationality $nationality
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Nationality $nationality)
    {
        $this->authorize('update_nationalities');
        return view('dashboard.nationalities.edit',compact('nationality'));
    }

    /**
     * @param NationalityRequest $request
     * @param Nationality        $nationality
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(NationalityRequest $request, Nationality $nationality)
    {
        $this->authorize('update_nationalities');
        $this->nationalityService->update($request->validated(),$nationality);
    }

    /**
     * @param Nationality $nationality
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Nationality $nationality)
    {
        $this->authorize('delete_nationalities');
        if(request()->ajax()){
            $this->nationalityService->destroy($nationality);
        }
    }
}
