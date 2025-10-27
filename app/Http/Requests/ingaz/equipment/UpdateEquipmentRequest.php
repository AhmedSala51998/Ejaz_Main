<?php

namespace App\Http\Requests\worldedge\equipment;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipmentRequest extends MainRequest
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
            'title:*' => 'required|string',
            'sub_description:*' => 'nullable|string',
            'description:*' => 'nullable|string',
            'image' => 'nullable|mimes:png,jpg,svg',
        ];
    }
}
