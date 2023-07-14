<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\MarketerRequest;
use App\Http\Services\Dashboard\MarketerService;
use App\Models\Marketer;
use Illuminate\Http\Request;

class MarketerController extends Controller
{
    public function __construct(private MarketerService $marketerService)
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
        $this->authorize('view_marketers');
        if ($request->ajax()) {
            return response()->json($this->marketerService->index());
        }
        return View('dashboard.marketers.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create_marketers');
        return View('dashboard.marketers.create');
    }

    /**
     * @param MarketerRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(MarketerRequest $request)
    {
        $this->authorize('create_marketers');
        $this->marketerService->store($request->validated());
    }

    /**
     * @param Marketer $marketer
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Marketer $marketer)
    {
        $this->authorize('show_marketers');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $this->authorize('update_marketers');
        $marketer = $this->marketerService->find($id);

        return view('dashboard.marketers.edit', compact('marketer'));
    }

    /**
     * @param MarketerRequest $request
     * @param                 $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(MarketerRequest $request,  $id)
    {
        $this->authorize('update_marketers');
        $this->marketerService->update($request->validated(), $id);
        return response()->json('done');
    }

    /**
     * @param Marketer $marketer
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Marketer $marketer)
    {
        $this->authorize('delete_marketers');
        $this->marketerService->destroy($marketer);
    }
}
