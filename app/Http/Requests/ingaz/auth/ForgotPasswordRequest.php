<?php

namespace App\Http\Requests\ingaz\auth;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone' => 'required|exists:users,phone'
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'رقم الجوال مطلوب',
            'phone.exists' => 'رقم الجوال غير موجود'
        ];
    }
}
