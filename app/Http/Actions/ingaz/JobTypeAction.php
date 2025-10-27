<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\ingaz\JobType;

class JobTypeAction extends MainAction
{
    public function __construct(JobType $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/JobType/';
    }

    public function store($data)
    {
        if ($data['image']) {
            $image = $data['image'];
            $data['image'] = uploadFile($image, $this->fileFolder);
        }
        return parent::store($data);
    }

    public function update($id, $data)
    {
        if (isset($data['image'])) {
            $obj = $this->find($id);
            deleteFile($obj->image);
            $image = $data['image'];
            $data['image'] = uploadFile($image, $this->fileFolder);
        }
        return parent::update($id, $data);
    }

    public function getJobsTypes(){
        return $this->model->latest()->get();
    }
}
