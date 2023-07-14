<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Services\Auth\EmployeeAuthService;
use App\Http\Requests\Auth\EmployeeAuthRequest;

class EmployeeAuthController extends Controller
{
    public $employeeAuthService;

    /**
     * EmployeeAuthController constructor.
     * @param EmployeeAuthService $employeeAuthService
     */
    public function __construct(EmployeeAuthService $employeeAuthService)
    {
        $this->employeeAuthService = $employeeAuthService;
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:employee')->except('logout');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showLoginForm()
    {
        return view('auth.employee_login');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showForgotPasswordForm()
    {
        return view('auth.employee_forgot_password');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showNewPasswordForm()
    {
        return view('auth.employee_new_password');
    }

    /**
     * @param EmployeeAuthRequest $request
     */
    public function login(EmployeeAuthRequest $request)
    {
        $data = $request->validated();
        $this->employeeAuthService->login($data);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        $this->employeeAuthService->logout();
        return redirect()->route('employee.login');
    }
}
