<?php

namespace App\Models\ingaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaidJob extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relations
    public function maid(){
        return $this->belongsTo(Maid::class,'maid_id');
    }

    public function job_type(){
        return $this->belongsTo(JobType::class,'job_type_id');
    }
}
