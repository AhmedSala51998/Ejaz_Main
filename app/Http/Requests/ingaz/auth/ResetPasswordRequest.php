<?php

namespace App\Http\Requests\ingaz\auth;

use App\Http\Requests\MainRequest;

class ResetPasswordRequest extends MainRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ];
    }
}
