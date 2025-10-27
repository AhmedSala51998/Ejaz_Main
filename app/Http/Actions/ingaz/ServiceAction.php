<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\ingaz\Service;

class ServiceAction extends MainAction
{
    public function __construct(Service $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Service/';
    }

    public function store($data)
    {
        if ($data['image']) {
            $image = $data['image'];
            $data['image'] = uploadFile($image, $this->fileFolder);
        }
        return parent::store($data);
    }

    public function updateService($id, $data)
    {
        $row = $this->find($id);
        if (isset($data['image'])) {
            deleteFile($row->image);
            $image = $data['image'];
            $data['image'] = uploadFile($image, $this->fileFolder);
        }
        return $row->update($data);
    }
}
