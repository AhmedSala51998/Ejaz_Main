<?php

namespace App\Http\Requests\ingaz;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JobTitleRequest extends MainRequest
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
        $jobTitleTranslationId = $this->route('job_title');

        $rules = [
            'image' => [$this->isMethod('post') ? 'required' : 'nullable'],
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules["title:$locale"] = ['required', Rule::unique('job_titles_translations', 'title')->where('locale', $locale)->ignore($jobTitleTranslationId, 'job_title_id')];
        }

        return $rules;
    }


}
