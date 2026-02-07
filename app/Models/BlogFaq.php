<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogFaq extends Model
{
    protected $table = 'blog_faqs';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'blog_id',
        'question',
        'answer',
        'status',
    ];

    protected $casts = [
        'status' => 'integer',
    ];


    public function blog()
    {
        return $this->belongsTo(\App\Models\Blog::class, 'blog_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
