<?php

namespace App\Http\Requests\ingaz;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReligionRequest extends MainRequest
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
        $updateId = $this->route('religion');
        foreach (config('translatable.locales') as $locale) {
            $rules["title:$locale"] = ['required', Rule::unique('religions_translations', 'title')->where('locale', $locale)->ignore($updateId, 'religion_id')];
        }

        return $rules;
    }
}
