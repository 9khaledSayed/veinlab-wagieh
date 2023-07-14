<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\{Ability, Role};
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public $modules  = [
        'employees',
        'roles',
        'settings',
        'reports',
        'recycle_bin',
        'patients',
        'home_visits',
        'doctors',
        'hospitals',
        'packages',
        'insurance_companies',
        'sectors',
        'main_analysis',
        'sub_analysis',
        'nationalities',
        'branches',
        'vacation_types',
        'allowance_types',
        'deduction_and_additions',
        'invoices'
    ];

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view_roles');
        $roles      = Role::with('abilities:id,category,action','employees:id')->get();
        $abilities  = Ability::select('id','name','category','action')->get();

        return view('dashboard.roles.index',[ 'roles' => $roles , 'abilities' => $abilities , 'modules' => $this->modules]);
    }

    /**
     * @param Role    $role
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Role $role,Request $request)
    {
        $this->authorize('show_roles');

        $role->load('abilities','employees:id');
        $abilities  = Ability::select('id','name','category','action')->get();

        if (!$request->ajax())
            return view('dashboard.roles.show',[ 'role' => $role , 'abilities' => $abilities , 'modules' => $this->modules]);
        else
            return response()->json(['name_ar' => $role['name_ar'] , 'name_en' => $role['name_en'] , 'role_abilities' => $role['abilities'] ]);
    }

    /**
     * @param Role    $role
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function employees(Role $role,Request $request)
    {
        $role->load('employees:id,name,email,phone,image,created_at');

        $employeesCount = $role->employees->count();

        $page    = $request['page']     ?? 1;
        $perPage = $request['per_page'] ?? 10;


        return response()->json([
            "recordsTotal" => $employeesCount,
            "recordsFiltered" => $role->employees->count(),
            'data' => $role->employees->skip(($page - 1) * $perPage)->take($perPage)
        ]);
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('create_roles');

        $data = $request->validate([
            "name_ar"   => ['required', 'string' , 'max:255','unique:roles'],
            "name_en"   => ['required', 'string' , 'max:255','unique:roles'],
            'abilities' => ['required', 'array'  , 'min:1'],
        ]);

        $role = Role::create($data);
        $role->abilities()->attach($request['abilities']);
    }

    /**
     * @param Request $request
     * @param Role    $role
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('update_roles');
        $data = $request->validate([
            "name_ar"   => ['required', 'string' , 'max:255','unique:roles,id,' . $role['id']],
            "name_en"   => ['required', 'string' , 'max:255','unique:roles,id,' . $role['id']],
            'abilities' => ['required', 'array'  , 'min:1'],
        ]);

        $role->update($data);
        $role->abilities()->sync($request['abilities']);
    }
}
