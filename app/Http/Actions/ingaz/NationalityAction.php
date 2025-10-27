<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\ingaz\Maid;
use App\Models\ingaz\Nationality;
use Illuminate\Support\Facades\Storage;

class NationalityAction extends MainAction
{
    public function __construct(Nationality $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Nationality/';
    }

    public function store($data)
    {
        if ($data['logo']) {
            $image = $data['logo'];
            $data['logo'] = uploadFile($image, $this->fileFolder);
        }
        return parent::store($data);
    }

    public function updateNationality($id, $data)
    {
        $row = $this->find($id);

        if (request()->hasFile('logo')) {
            Storage::delete($row->logo);
            $data['logo'] = uploadFile($data['logo'], $this->fileFolder, 1);
        }
        if ($data['price'] != null){
            Maid::where('nationality_id', $id)->update(['price' => $data['price']]);
        }

        return $row->update($data);
    }

    public function getNationalities(){
        return $this->model->latest()->get();
    }
}
