<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\ingaz\OrderDetail;

class OrderDetailAction extends MainAction
{
    public function __construct(OrderDetail $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/OrderDetail/';
    }
}
