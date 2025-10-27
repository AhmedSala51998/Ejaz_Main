<?php

namespace App\Http\Requests\ingaz;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreContractRequest extends MainRequest
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
            'contract_date' => 'required',
            'msaned_number' => 'required',
            'tafwed_number' => 'required',
            'visa_number' => 'required',
            'visa_milad_date' => 'required',
            'visa_hijry_date' => 'required',
            'contract_duration' => 'required',
        ];
    }

    public function messages(){
        return [
            'contract_date.required' => 'يرجي ادخال تاريخ العقد',
            'msaned_number.required' => 'يرجي ادخال رقم مساند',
            'tafwed_number.required' => 'يرجي ادخال رقم التفويض',
            'visa_number.required' => 'يرجي ادخال رقم التأشيرة',
            'visa_milad_date.required' => 'يرجي ادخال تاريخ التأشيرة الميلادي',
            'visa_hijry_date.required' => 'يرجي ادخال تاريخ التأشيرة الهجري',
            'contract_duration.required' => 'يرجي ادخال مدة العقد',
        ];
    }
}
