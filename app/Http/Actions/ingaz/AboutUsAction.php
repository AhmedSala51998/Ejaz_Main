<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\ingaz\AboutUs;

class AboutUsAction extends MainAction
{
    public function __construct(AboutUs $model)
    {
        $this->model = $model;
        $this->files = [''];
        $this->fileFolder = 'images/AboutU/';
    }
}
