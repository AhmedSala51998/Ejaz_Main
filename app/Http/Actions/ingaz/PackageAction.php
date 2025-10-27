<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\ingaz\Package;

class PackageAction extends MainAction
{
    public function __construct(Package $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Package/';
    }

    public function updatePackage($id, $data)
    {
        $row = $this->find($id);
        return $row->update($data);
    }


}
