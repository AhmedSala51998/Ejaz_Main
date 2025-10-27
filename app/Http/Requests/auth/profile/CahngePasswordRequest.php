<?php

namespace App\Http\Requests\auth\profile;

use App\Http\Requests\MainRequest;
use App\Rules\MatchOldPassword;


class CahngePasswordRequest extends MainRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => ['required', new MatchOldPassword()],
            'new_password' => ['required','min:8'],
            'new_confirm_password' => ['same:new_password'],
        ];
    }
}
