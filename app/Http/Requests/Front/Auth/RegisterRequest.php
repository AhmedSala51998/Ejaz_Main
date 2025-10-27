<?php

namespace App\Http\Requests\Front\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'phone'=>'required',
            'password'=>'required',
            'code'=>'nullable',
            'logo'=>'nullable'
        ];
    }//end fun


    public function messages()
    {
        return [
          'phone.unique'=>__('frontend.this phone is already taken')
        ];
    }
}//end class
