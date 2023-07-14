<?php

namespace App\Http\Requests\Dashboard\HomeVisit;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\GenderType;
use Illuminate\Validation\Rules\Enum;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('create_home_visits');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => ['required','max:255','unique:patients','regex:/(^(009665|9665|\+9665|966|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$)/u'],
            'email' => 'required|email',
            'gender' => ['required',new Enum(GenderType::class)],
            'date_time' => 'required|after_or_equal:now',
        ];
    }
}
