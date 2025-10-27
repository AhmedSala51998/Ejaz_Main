<?php

namespace App\Http\Requests\ingaz;

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
            'about_image' => 'nullable',
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
            'rights_maids:ar' => 'nullable|string',
            'rights_maids:en' => 'nullable|string',
            'rights_users:ar' => 'nullable|string',
            'rights_users:en' => 'nullable|string',
            'privacy:ar' => 'nullable|string',
            'privacy:en' => 'nullable|string',
            'about_us_sub_title:ar' => 'nullable|string',
            'about_us_sub_title:en' => 'nullable|string',
            'footer_text:ar' => 'nullable|string',
            'footer_text:en' => 'nullable|string',
        ];
    }
}
