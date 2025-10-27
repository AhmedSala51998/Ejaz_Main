<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\ingaz\Step;
use Illuminate\Support\Facades\Storage;

class StepAction extends MainAction
{
    public function __construct(Step $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Step/';
    }

    public function store($data)
    {
        if ($data['icon']) {
            $image = $data['icon'];
            $data['icon'] = uploadFile($image, $this->fileFolder);
        }
        return parent::store($data);
    }

    public function updateStep($id, $data)
    {
        $row = $this->find($id);

        if (request()->hasFile('icon')) {
            Storage::delete($row->icon);
            $data['icon'] = uploadFile($data['icon'], $this->fileFolder, 1);
        }

        return $row->update($data);
    }
}
