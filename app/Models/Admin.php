<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Model
{
    use HasFactory;

    protected $guard_name = 'admin';
    protected $guarded=[];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeAdminType($query,$type)
    {
        return $query->where('admin_type',$type);
    }
    public function orders(){

        return $this->hasMany(Order::class,'admin_id');
    }
    public function roles(){
        return $this->belongsToMany(Role::class,'admins_roles','admin_id','role_id');
    }
    public function permissions(){
        return $this->hasManyThrough(Permission::class,Role::class);
    }

}//end class
