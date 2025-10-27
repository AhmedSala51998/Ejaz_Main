<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\ingaz\Statistic;
use Illuminate\Support\Facades\Storage;

class StatisticAction extends MainAction
{
    public function __construct(Statistic $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Statistic/';
    }




    public function storeStatistic($data)
    {
//        if ($data['image']) {
//            $image = $data['image'];
//            $data['image'] = uploadFile($image, $this->fileFolder);
//        }
        return parent::store($data);
    }

    public function updateStatistic($id, $data)
    {
        $row = $this->find($id);
        return $row->update($data);
    }
}
