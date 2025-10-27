<?php

namespace App\Http\Requests\ingaz;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MaidRequest extends MainRequest
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
            'cv_file' => [$this->isMethod('post') ? 'required' : ''],
            'nationality_id' => 'required|exists:nationalities,id',
            'passport_num' => [
                'required',
                'min:5',
                Rule::unique('maids')->ignore($this->route('maid')),
            ],
            'price' => 'required|numeric',
            'salary' => 'required|numeric',
            'experience_years' => 'required',
            'religion_id' => 'required|exists:religions,id',
            'age' => 'required|numeric|between:18,90',
            'job_id' => 'required|array',
            'job_id.*' => 'required|exists:job_titles,id',
            'type_id' => 'required|array',
            'type_id.*' => 'required|exists:job_types,id',
            'office_id' => 'required|exists:recruitment_offices,id',
        ];
    }

    public function messages()
    {
        return [
            'cv_file.required' => helperTrans('web.cv_file_is_required'),
            'nationality_id.required' => helperTrans('web.nationality_id_is_required'),
            'nationality_id.exists' => helperTrans('web.invalid_nationality_id'),
            'passport_num.required' => helperTrans('web.passport_num_is_required'),
            'passport_num.min' => helperTrans('web.passport_num_min_length'),
            'passport_num.unique' => helperTrans('web.you_entered_this_passport_number_before'),
            'price.required' => helperTrans('web.price_is_required'),
            'price.numeric' => helperTrans('web.price_must_be_numeric'),
            'salary.required' => helperTrans('web.salary_is_required'),
            'salary.numeric' => helperTrans('web.salary_must_be_numeric'),
            'experience_years.required' => helperTrans('web.experience_years_is_required'),
            'religion_id.required' => helperTrans('web.religion_id_is_required'),
            'religion_id.exists' => helperTrans('web.invalid_religion_id'),
            'age.required' => helperTrans('web.age_is_required'),
            'age.numeric' => helperTrans('web.age_must_be_numeric'),
            'age.between' => helperTrans('web.age_must_be_between_18_and_90'),
            'job_id.required' => helperTrans('web.job_id_is_required'),
            'job_id.array' => helperTrans('web.job_id_must_be_an_array'),
            'job_id.*.required' => helperTrans('web.each_job_id_is_required'),
            'job_id.*.exists' => helperTrans('web.invalid_job_id'),
            'type_id.required' => helperTrans('web.type_id_is_required'),
            'type_id.array' => helperTrans('web.type_id_must_be_an_array'),
            'type_id.*.required' => helperTrans('web.each_type_id_is_required'),
            'type_id.*.exists' => helperTrans('web.invalid_type_id'),
            'office_id.required' => helperTrans('web.recruitment office is required'),
            'office_id.exists' => helperTrans('web.office_id not exist'),
        ];
    }
}
