<?php

namespace App\Models\ingaz;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Translatable, HasFactory;

    protected $guarded = [];

    public $translatedAttributes = ['title','description'];
    protected $translationForeignKey = 'service_id';
    public $translationModel = ServicesTranslation::class;
    protected $with = ['translations'];


}
