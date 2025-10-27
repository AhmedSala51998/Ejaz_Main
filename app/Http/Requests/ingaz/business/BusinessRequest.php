<?php

namespace App\Http\Requests\worldedge\business;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends MainRequest
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
            'content:ar' => 'required',
            'content:en' => 'required',
            'alt:ar' => 'required',
            'alt:en' => 'required',
            'sub_description:*' => 'nullable|string',
            'image' => 'nullable|mimes:png,jpg',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'alt2.*' => 'required',
        ];
    }
}
