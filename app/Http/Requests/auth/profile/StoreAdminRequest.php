<?php

namespace App\Http\Requests\auth\profile;

use App\Enums\auth\AdminTypes;
use App\Http\Requests\MainRequest;
use Illuminate\Validation\Rules\Enum;

class StoreAdminRequest extends MainRequest
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
            'email' => ['required','email','unique:admins'],
            'admin_type' => ['required',new Enum(AdminTypes::class)],
            'whatsapp' => ['nullable'],
            'sex_type' => ['required',"in:0,1"],

//            'permissions' => 'required|min:1',
        ];
    }
}
