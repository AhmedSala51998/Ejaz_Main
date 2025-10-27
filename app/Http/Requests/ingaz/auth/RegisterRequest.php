<?php

namespace App\Http\Requests\ingaz\auth;

use App\Enums\api\UserTypeisEnum;
use App\Enums\RegisterFromType;
use App\Http\Requests\MainRequest;
use Illuminate\Validation\Rules\Enum;

class RegisterRequest extends MainRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'software_type' => ['required',new Enum(RegisterFromType::class)],
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'phone_code' => 'required',
            'phone' => 'required|numeric|min:9',
        ];
    }
}
