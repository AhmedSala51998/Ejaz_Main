<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\ingaz\Complaint;

class ComplaintAction extends MainAction
{
    public function __construct(Complaint $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Complaint/';
    }
}
