<?php

namespace App\Http\Requests\worldedge\client;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends MainRequest
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
            'link' => 'required',
            'image' => 'required|mimes:png,jpg,svg',
        ];
    }
}
