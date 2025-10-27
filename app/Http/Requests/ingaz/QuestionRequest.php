<?php

namespace App\Http\Requests\ingaz;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionRequest extends MainRequest
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
        $updateId = $this->route('question');

        foreach (config('translatable.locales') as $locale) {
            $rules["title:$locale"] = ['required', Rule::unique('questions_translations', 'title')->where('locale', $locale)->ignore($updateId, 'question_id')];
            $rules["description:$locale"] = ['required', Rule::unique('questions_translations', 'description')->where('locale', $locale)->ignore($updateId, 'question_id')];
        }
        return $rules;
    }
}
