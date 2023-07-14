<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SectorRequest;
use App\Models\Sector;
use App\Http\Services\Dashboard\SectorService;

class SectorController extends Controller
{
    public $sectorService;

    public function __construct(SectorService $sectorService)
    {
        $this->sectorService = $sectorService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view_sectors');
        if(request()->ajax()){
            return response()->json($this->sectorService->index());
        }
        return view('dashboard.sectors.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create_sectors');
        return view('dashboard.sectors.create');
    }

    /**
     * @param SectorRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(SectorRequest $request)
    {
        $this->authorize('create_sectors');
        $this->sectorService->store($request->validated());
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show($id)
    {
        return redirect(back());
    }

    /**
     * @param Sector $sector
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Sector $sector)
    {
        $this->authorize('update_sectors');
        return view('dashboard.sectors.edit',compact('sector'));
    }

    /**
     * @param SectorRequest $request
     * @param Sector        $sector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(SectorRequest $request, Sector $sector)
    {
        $this->authorize('update_sectors');
        $this->sectorService->update($request->validated(),$sector);
    }

    /**
     * @param Sector $sector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Sector $sector)
    {
        $this->authorize('delete_sectors');
        if(request()->ajax()){
            $this->sectorService->destroy($sector);
        }
    }
}
