<?php

namespace App\Http\Requests\worldedge\partner;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends MainRequest
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
            'title:ar' => 'required',
            'title:en' => 'required',
            'image' => 'nullable|mimes:png,jpg,svg',
        ];
    }
}
