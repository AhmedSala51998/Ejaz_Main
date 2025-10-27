<?php

namespace App\Http\Requests\worldedge\AboutUs;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;

class EditAboutUsRequest extends MainRequest
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
            'small_title:*' => 'nullable|string',
            'large_title:*' => 'required|string',
            'counter_title:*' => 'nullable|string',
            'alt:*' => 'required|string',
            'list_content:*' => 'required|string',
            'description:*' => 'required|string',
            'image' => 'nullable|mimes:png,jpg',
            'counter' => 'nullable',
            'type' => 'required',
        ];
    }
}
