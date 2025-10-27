<?php

namespace App\Models\ingaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnRequest extends Model
{
    use HasFactory;

    protected $fillable = ['order_id','user_id','maid_id','notes','status','file'];

    public function maid(){
        return $this->belongsTo(Maid::class,'maid_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
