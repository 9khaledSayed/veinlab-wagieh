<?php

namespace App\Http\Services\Auth;

use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Validation\ValidationException;
use App\Models\Employee;

class EmployeeAuthService {

    /**
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login($request){
        $employee = Employee::where('email',$request['email'])->first();
        if ($employee)
        {
            if(Hash::check($request['password'], $employee['password']))
            {
                Auth::guard('employee')->login($employee,isset($request['remember']) && $request['remember']==1?true:false);
                return redirect()->intended('/dashboard');
            } else {
                throw ValidationException::withMessages([
                    "password" => __("The password is incorrect"),
                ]);
            }

        } else {
            throw ValidationException::withMessages([
                "password" => __("The password is incorrect"),
                "email" => __("This email doesn't exist"),
            ]);
        }
    }


    public function logout(){
        Auth::guard('employee')->logout();
    }
}
