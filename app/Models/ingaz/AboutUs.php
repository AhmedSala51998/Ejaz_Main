<?php

namespace App\Models\ingaz;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use Translatable,HasFactory;

    protected $guarded = [];

    public $translatedAttributes = ['title','description'];
    protected $translationForeignKey = 'about_us_id';
    public $translationModel = AboutUsTranslation::class;
    protected $with = ['translations'];
}
