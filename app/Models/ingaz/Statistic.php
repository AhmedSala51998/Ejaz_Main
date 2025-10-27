<?php

namespace App\Models\ingaz;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use Translatable, HasFactory;

    protected $guarded = [];

    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'statistic_id';
    public $translationModel = StatisticsTranslation::class;
    protected $with = ['translations'];


}
