<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\ingaz\Religion;

class ReligionAction extends MainAction
{
    public function __construct(Religion $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Religion/';
    }





    public function getReligions(){
        return $this->model->latest()->get();
    }
}
