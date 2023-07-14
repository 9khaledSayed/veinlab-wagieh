<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\EmployeeRequest;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Services\Dashboard\{EmployeeService, RoleService, Employee\UpdateProfileRequest};
class EmployeeController extends Controller
{

    public $employeeService;
    public $roleService;

    /**
     * EmployeeController constructor.
     * @param EmployeeService $employeeService
     * @param RoleService     $roleService
     */
    public function __construct(EmployeeService $employeeService,RoleService $roleService){
        $this->employeeService = $employeeService;
        $this->roleService = $roleService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize('view_employees');

        if ($request->ajax())
        {
            return response()->json($this->employeeService->index());
        }

        return view('dashboard.employees.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create_employees');
        $roles = $this->roleService->allRoles();
        return view('dashboard.employees.create',compact('roles'));
    }

    /**
     * @param Employee $employee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Employee $employee)
    {
        $this->authorize('show_employees');

        $roles = $this->roleService->allRoles();

        return view('dashboard.employees.show',compact('employee','roles'));
    }

    /**
     * @param Employee $employee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Employee $employee)
    {
        $this->authorize('update_employees');

        $roles = $this->roleService->allRoles();

        return view('dashboard.employees.edit',compact('employee','roles'));
    }

    /**
     * @param EmployeeRequest $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(EmployeeRequest $request)
    {

        $this->authorize('create_employees');

        $data = $request->validated();

        $this->employeeService->store($data);

    }

    /**
     * @param EmployeeRequest $request
     * @param Employee        $employee
     */
    public function update(EmployeeRequest $request , Employee $employee)
    {
        $data = $request->validated();

        $this->employeeService->update($employee,$data);
    }

    /**
     * @param Request  $request
     * @param Employee $employee
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request, Employee $employee)
    {
        $this->authorize('delete_employees');

        if($request->ajax())
        {
            $this->employeeService->delete($employee);
        }
    }

    /**
     * @param UpdateProfileRequest $request
     */
    public function updateProfile(UpdateProfileRequest $request){
        $this->employeeService->updateProfile($request->validated());
    }

    /**
     * @param Request $request
     */
    public function updatePassword(Request $request){
        $data = $request->validate([
            'password' => ['required','string','min:6','max:255','confirmed'],
            'password_confirmation' => ['required','same:password'],
        ]);
        auth()->user()->update($data);
    }
}
