<?php

namespace App\Models\ingaz;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use Translatable, HasFactory;

    protected $guarded = [];

    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'slider_id';
    public $translationModel = SlidersTranslation::class;
    protected $with = ['translations'];
}
