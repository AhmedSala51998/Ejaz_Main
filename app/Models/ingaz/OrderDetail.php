<?php

namespace App\Models\ingaz;

use App\Models\auth\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['package','address'];


    // relations
    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id');
    }

    public function package(){
        return $this->belongsTo(Package::class,'package_id');
    }

    public function address(){
        return $this->belongsTo(UserAddress::class,'address_id');
    }




}
