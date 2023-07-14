<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Http\Requests\Dashboard\DoctorRequest;
use App\Http\Services\Dashboard\DoctorServices;
use App\Models\Doctor;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\{JsonResponse, Request};

class DoctorController extends Controller
{

    public function __construct(private DoctorServices $doctorServices)
    {
        //
    }

    /**
     * @param Request $request
     * @return View|JsonResponse
     * @throws AuthorizationException
     */
    public function index(Request $request) : View | JsonResponse
    {
       $this->authorize('view_doctors');
        if($request->ajax()){
            return response()->json($this->doctorServices->index());
        }
        return view('dashboard.doctors.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
       $this->authorize('create_doctors');
        return view('dashboard.doctors.create');
    }

    /**
     * @param DoctorRequest $request
     * @throws AuthorizationException
     */
    public function store(DoctorRequest $request)
    {
        $this->authorize('create_doctors');
        $this->doctorServices->store($request->validated());
    }

    /**
     * @param Doctor $doctor
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     * @throws AuthorizationException
     */
    public function show(Doctor $doctor)
    {
       $this->authorize('show_doctors');
        return view('dashboard.doctors.show', compact('doctor'));
    }

    /**
     * @param Doctor $doctor
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     * @throws AuthorizationException
     */
    public function edit(Doctor $doctor)
    {
        $this->authorize('update_doctors');
        return view('dashboard.doctors.edit', compact('doctor'));
    }

    /**
     * @param DoctorRequest $request
     * @param Doctor        $doctor
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {
        $this->authorize('update_doctors');
        return response()->json($this->doctorServices->update($request->validated(), $doctor));

    }

    /**
     * @param Request $request
     * @param Doctor  $doctor
     * @throws AuthorizationException
     */
    public function destroy(Request $request, Doctor $doctor)
    {
        $this->authorize('delete_doctors');

        if($request->ajax())
        {
            $this->doctorServices->delete($doctor);
        }
    }
}
