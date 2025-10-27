<?php

namespace App\Http\Requests\worldedge\slider;

use Illuminate\Validation\Rule;
use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends MainRequest
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
            'small_title:ar' => 'required',
            'small_title:en' => 'required',
            'big_title:ar' => 'required',
            'big_title:en' => 'required',
            'alt:ar' => 'required',
            'alt:en' => 'required',
            'image' => 'nullable|mimes:png,jpg',
            'link' => 'required',
        ];
    }
}
