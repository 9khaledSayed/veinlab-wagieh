<?php

namespace App\Http\Requests\Dashboard;

use App\Models\MainAnalysis;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PackageRequest extends FormRequest
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

    //before:today : after:today
    protected function onCreate(){
        return [
            'name'             => 'required|max:255|unique:packages',
            'price'            => 'required|numeric',
            'from_date'        => 'nullable|date',
            'to_date'          => 'nullable|date',
            'status'           => 'required|in:active,inactive',
            'main_analysis_id' => ['required','array',Rule::in(MainAnalysis::pluck('id'))]
        ];
    }

    protected function onUpdate(){
        $package = $this->route('package');

        return [
            'name'             => 'required|max:255',Rule::unique('packages')->ignore($package->id,'id'),
            'price'            => 'required|numeric',
            'from_date'        => 'nullable|date',
            'to_date'          => 'nullable|date',
            'status'           => 'required|in:active,inactive',
            'main_analysis_id' => ['required','array',Rule::in(MainAnalysis::pluck('id'))]
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
