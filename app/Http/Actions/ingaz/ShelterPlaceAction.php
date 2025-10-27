<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\RecruitmentOffices;
use App\Models\ShelterPlaces;
use Illuminate\Support\Facades\Storage;

class ShelterPlaceAction extends MainAction
{
    public function __construct(ShelterPlaces $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/ShelterPlace/';
    }
    public function updateRec($id, $data)
    {
        $row = $this->find($id);
        return $row->update($data);

    }

    public function getAllRows()
    {
        return $this->model->latest()->get();
    }
}
