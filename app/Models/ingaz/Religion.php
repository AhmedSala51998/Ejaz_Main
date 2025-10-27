<?php

namespace App\Models\ingaz;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    use Translatable, HasFactory;

    protected $guarded = [];

    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'religion_id';
    public $translationModel = ReligionsTranslation::class;
    protected $with = ['translations'];

}
