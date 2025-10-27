<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\ingaz\MaidJob;

class MaidJobAction extends MainAction
{
    public function __construct(MaidJob $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/MaidJob/';
    }
}
