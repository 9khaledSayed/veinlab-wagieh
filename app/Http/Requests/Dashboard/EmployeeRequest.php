<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function onCreate(){
        return [
            'name'      => ['required', 'string', 'max:255','min:3'],
            'phone'     => ['required','max:255','unique:employees','regex:/(^(009665|9665|\+9665|966|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$)/u'],
            'password'  => ['required','string','min:8','max:255','confirmed'],
//            'password_confirmation' => ['required','same:password'],
            'email'     => ['required','string', "email:rfc,dns",'unique:employees'],
            'roles'     => ['required','array','min:1'],
        ];
    }

    protected function onUpdate(){
        $id = $this->route('employee')->id;
        return [
            'name'     => ['required', 'string', 'max:255'],
            'phone'    => ['required','max:255','regex:/(^(009665|9665|\+9665|966|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$)/u'],
            'password' => ['nullable','exclude_if:password,null','string','min:8','max:255','confirmed'],
//            'password_confirmation' => ['nullable','exclude_if:password_confirmation,null','same:password'],
            'email'    => ['required','string', "email:rfc,dns",'unique:employees,id,' . $id ],
            'roles'    => ['required','array','min:1'],
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return request()->isMethod('put') || request()->isMethod('patch') ?
            $this->onUpdate() : $this->onCreate();
    }
}
