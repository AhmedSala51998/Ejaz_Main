<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'blogs';

    protected $guarded = [];

    public $translatable = [
        'title',
        'excerpt',
        'content'
    ];

}
