<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\ingaz\JobTitle;
use Illuminate\Support\Facades\Storage;

class JobTitleAction extends MainAction
{
    public function __construct(JobTitle $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/JobTitle/';
    }

    public function store($data)
    {
        if ($data['image']) {
            $image = $data['image'];
            $data['image'] = uploadFile($image, $this->fileFolder, 1);
        }
        return parent::store($data);
    }


    public function updateJobTitle($id, $data)
    {
        $row = $this->find($id);

        if (request()->hasFile('image')) {
            Storage::delete($row->image);
            $data['image'] = uploadFile($data['image'], $this->fileFolder, 1);
        }

        return $row->update($data);

    }

    public function getJobsTitles(){
        return $this->model->latest()->get();
    }
}
