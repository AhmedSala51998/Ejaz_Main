<?php

namespace App\Http\Requests\ingaz\auth;

use App\Http\Requests\MainRequest;

class SaveFcmTokenRequest extends MainRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'token' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'token.required' => 'FCM Token مطلوب',
        ];
    }
}
