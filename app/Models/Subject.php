<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Subject extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $guarded = [];
    protected $table='frequently_subjects';
    public $translatable = ['title',"desc"];

}
