<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\ingaz\Contact;

class ContactAction extends MainAction
{
    public function __construct(Contact $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Contact/';
    }
}
