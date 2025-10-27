<?php

namespace App\Http\Requests\worldedge\settings;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends MainRequest
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
            'logo_header' => 'nullable',
            'logo_footer' => 'nullable',
            'favicon' => 'nullable',
            'twitter' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'snapchat' => 'nullable',
            'linkedin' => 'nullable',
            'youtube' => 'nullable',
            'whatsapp' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'other_phone' => 'nullable',
            'map_link' => 'nullable',
            'location:ar' => 'nullable|string',
            'location:en' => 'nullable|string',
            'copyright:ar' => 'nullable',
            'copyright:en' => 'nullable',
            'website_name:ar' => 'nullable|string',
            'website_name:en' => 'nullable|string',
            'privacy:ar' => 'nullable|string',
            'privacy:en' => 'nullable|string',
        ];
    }
}
