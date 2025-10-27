<?php

namespace App\Models\ingaz;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use Translatable,HasFactory;
    protected $guarded = [];
    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'job_title_id';
    public $translationModel = JobTitlesTranslation::class;
    protected $with = ['translations'];

    public function job_title(){
        return $this->belongsTo(JobTitle::class,'job_title_id');
    }
}
