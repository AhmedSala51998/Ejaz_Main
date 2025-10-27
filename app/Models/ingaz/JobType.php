<?php

namespace App\Models\ingaz;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use Translatable,HasFactory;
    protected $guarded = [];
    public $translatedAttributes = ['title'];
    protected $translationForeignKey = 'job_type_id';
    public $translationModel = JobTypesTranslation::class;
    protected $with = ['translations'];

    public function job_type(){
        return $this->belongsTo(JobType::class,'job_type_id');
    }

    public function orders(){
        return $this->hasMany(Order::class,'job_type_id');
    }
}
