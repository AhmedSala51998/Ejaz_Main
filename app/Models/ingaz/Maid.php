<?php

namespace App\Models\ingaz;

use App\Http\Controllers\ingaz\RecruitmentOffice;
use App\Models\RecruitmentOffices;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maid extends Model
{
    use HasFactory,Translatable;

    protected $guarded = [];
    public $translatedAttributes = ['languages','marital_status'];
    protected $translationForeignKey = 'maid_id';
    public $translationModel = MaidTranslation::class;
    protected $with = ['translations'];


    ####### relations
    public function nationality(){
        return $this->belongsTo(Nationality::class,'nationality_id');
    }

    public function religion(){
        return $this->belongsTo(Religion::class,'religion_id');
    }

    public function job_types(){
        return $this->hasMany(MaidJob::class,'maid_id');
    }

    public function job_titles(){
        return $this->hasMany(MaidJobTitles::class,'maid_id');
    }

    public function jobTypes()
    {
        return $this->belongsToMany(JobType::class, 'maid_jobs', 'maid_id', 'job_type_id');
    }

    public function jobTitles()
    {
        return $this->belongsToMany(JobTitle::class, 'maid_job_titles', 'maid_id', 'job_title_id');
    }


    ####### scopes
    public function scopeShown($query)
    {
        return $query->where('is_show', true);
    }

    public function scopeAvailableFromToday($query)
    {
        return $query->where('available_at', '>=', now()->toDateString());
    }
    public function scopeNotAvailable($query)
    {
        return $query->where('available_at', '<', now()->toDateString());
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'maid_id');
    }

    public function office()
    {
        return $this->belongsTo(RecruitmentOffices::class,'office_id');
    }




}
