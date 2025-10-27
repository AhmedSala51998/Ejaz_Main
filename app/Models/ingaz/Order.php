<?php

namespace App\Models\ingaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];


    // relations
    public function maid(){
        return $this->belongsTo(Maid::class,'maid_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


    public function jobType(){
        return $this->belongsTo(JobType::class,'job_type_id');
    }

    public function details(){
        return $this->hasOne(OrderDetail::class,'order_id')->with(['admin']);
    }

    public function package()
    {
        return $this->hasOneThrough(
            Package::class,
            OrderDetail::class,
            'order_id', // Foreign key on the OrderDetail table
            'id',       // Local key on the Order table
            'id',       // Local key on the Package table
            'package_id' // Foreign key on the Package table
        );
    }

    public function address()
    {
        return $this->hasOneThrough(
            UserAddress::class,
            OrderDetail::class,
            'order_id', // Foreign key on the OrderDetail table
            'id',       // Local key on the Order table
            'id',       // Local key on the Package table
            'address_id' // Foreign key on the Package table
        );
    }

    protected static function generateUniqueCode()
    {
        $code = mt_rand(10000, 99999);

        // Check if the code is unique, generate a new one if needed
        while (static::where('order_code', $code)->exists()) {
            $code = mt_rand(10000000, 99999999);
        }

        return $code;
    }

    public function getPackageTitleAttribute()
    {
        return $this->package->title ?? null;
    }

}
