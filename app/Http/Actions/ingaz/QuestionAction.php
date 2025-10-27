<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\ingaz\Question;

class QuestionAction extends MainAction
{
    public function __construct(Question $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Question/';
    }
}
