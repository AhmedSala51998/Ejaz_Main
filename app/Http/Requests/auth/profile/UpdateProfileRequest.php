<?php

namespace App\Http\Requests\auth\profile;

use App\Http\Requests\MainRequest;


class UpdateProfileRequest extends MainRequest
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
            'name' => 'required',
            'email' => 'required',
            'image'=>'image'
        ];
    }
}
