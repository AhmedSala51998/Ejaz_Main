<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class RecruitmentOffice extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $guarded = [];
    public $translatable = ['title'];
    public function country(){
        return $this->belongsTo(Nationalitie::class,'country_id');
    }
    public function cvs(){
        return $this->hasMany(Biography::class,'recruitment_office_id');
    }
}
