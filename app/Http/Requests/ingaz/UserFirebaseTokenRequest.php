<?php

namespace App\Http\Requests\ingaz;

use App\Enums\ingaz\FirebaseTypeIsEnum;
use App\Http\Requests\MainRequest;
use Illuminate\Validation\Rules\Enum;

class UserFirebaseTokenRequest extends MainRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'software_type' => ['required',new Enum(FirebaseTypeIsEnum::class)],
            'phone_token' => 'required',
        ];
    }
}
