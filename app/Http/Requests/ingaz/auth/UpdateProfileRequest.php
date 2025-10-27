<?php

namespace App\Http\Requests\ingaz\auth;

use App\Http\Requests\MainRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends MainRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userId = getGuardedUser()->id;
        return [
            'name' => 'nullable',
            'phone' => 'nullable|unique:users,phone,' . $userId,
            'phone_code' => 'nullable',
            'old_password' => 'required_with:new_password',
            'new_password' => 'nullable|min:6',
            'confirm_password' => 'required_with:new_password|same:new_password',
        ];
    }
}
