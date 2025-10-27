<?php

namespace App\Http\Requests\ingaz\auth;

use App\Enums\api\UserTypeisEnum;
use App\Http\Requests\MainRequest;
use Illuminate\Validation\Rules\Enum;

class LoginRequest extends MainRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required|exists:users,phone',
            'password' => 'required|min:6',
        ];
    }
}
