<?php

namespace App\Http\Requests\auth\profile;

use App\Http\Requests\MainRequest;
use Illuminate\Validation\Rule;


class UpdateAdminRequest extends MainRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['required', Rule::unique('admins')->ignore($this->admin)],
            'whatsapp' => ['nullable'],
            'sex_type' => ['required',"in:0,1"],
//            'permissions' => 'required|min:1'
        ];
    }
}
