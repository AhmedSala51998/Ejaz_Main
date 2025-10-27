<?php

namespace App\Models\ingaz;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use Translatable,HasFactory;

    protected $guarded = [];

    public $translatedAttributes = ['title','sub_title'];
    protected $translationForeignKey = 'nationality_id';
    public $translationModel = NationalitiesTranslation::class;
    protected $with = ['translations'];


}
