<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\ingaz\DevelopSetting;

class DevelopSettingAction extends MainAction
{
    public function __construct(DevelopSetting $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/DevelopSetting/';
    }
}
