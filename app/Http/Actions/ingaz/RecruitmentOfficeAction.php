<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\RecruitmentOffices;
use Illuminate\Support\Facades\Storage;

class RecruitmentOfficeAction extends MainAction
{
    public function __construct(RecruitmentOffices $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/recruitment-offices/';
    }
    public function updateRec($id, $data)
    {
        $row = $this->find($id);
        return $row->update($data);

    }

    public function getAllOffices()
    {
        return $this->model->latest()->get();
    }
}
