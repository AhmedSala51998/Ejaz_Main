<?php

namespace App\Http\Requests\ingaz;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends MainRequest
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
            'original_price' => 'required|numeric|min:0',
            'price_after_discount' => 'nullable|numeric|min:0|lt:original_price',
            'price_with_tax' => 'required|numeric|min:0',
            'nationality_id' => 'required|exists:nationalities,id',
            'days_count' => 'required|numeric|min:0',
            'title:en' => 'required',
            'title:ar' => 'required',
        ];
    }
}
