<?php

namespace App\Http\Requests\ingaz\auth;

use App\Http\Requests\MainRequest;
use Illuminate\Support\Facades\Auth;

class SendCodeRequest extends MainRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required',
            'phone_code' => 'required',
            'reset' => 'nullable',
        ];
    }
}
