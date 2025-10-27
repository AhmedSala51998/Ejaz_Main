<?php

namespace App\Http\Requests\ingaz;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;

class makeTransferRequest extends MainRequest
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
            'contract_id'   => 'required',
            'new_client_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'contract_id.required' => helperTrans('ingaz.choose the contract'),
            'new_client_id.required' => helperTrans('ingaz.choose the new client'),
        ];
    }
}
