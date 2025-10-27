<?php

namespace App\Http\Requests\Front\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone_code'=>'required',
            'phone_iso'=>'required',
            'phone_county'=>'required',
            'phone'=>'required',
            'country_id'=>'required',
            'city'=>'required',
            'birth_date'=>'date|nullable',
            'logo'=>'nullable'
        ];
    }//end fun


    public function messages()
    {
        return [
          'email.unique'=>__('frontend.this email is already taken')  ,
          'phone.unique'=>__('frontend.this phone is already taken')
        ];
    }
}//end class
