<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomWorkerRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'phone'=>'required',
            'city_id'=>'required',
            'nationalitie_id'=>'required',
            'job_id'=>'required',
            'order_of_age_id'=>'required',
            'social_type_id'=>'required',
            'religion_id'=>'required',
            'language_title_id'=>'required',
            'type_of_experience'=>'required',
            'special_requirement'=>'nullable',
        ];
    }
}
