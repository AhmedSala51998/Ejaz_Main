<?php

namespace App\Models\ingaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaidJobTitles extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relations
    public function maid(){
        return $this->belongsTo(Maid::class,'maid_id');
    }

    public function job_title(){
        return $this->belongsTo(JobTitle::class,'job_title_id');
    }
}
