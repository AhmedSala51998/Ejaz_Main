<?php

namespace App\Models\ingaz;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Translatable, HasFactory;

    protected $guarded = [];

    public $translatedAttributes = ['location', 'privacy', 'rights_maids', 'rights_users', 'copyright', 'website_name',
    'about_us_sub_title', 'footer_text','terms_conditions', 'work_times', 'about_us_app'];
    protected $translationForeignKey = 'setting_id';
    public $translationModel = SettingsTranslation::class;
    protected $with = ['translations'];
    // need to be tested
//    public function __construct(array $attributes = [])
//    {
//        parent::__construct($attributes);
//        // Get all fillable attributes except 'created_at'
//        $this->translatedAttributes = array_diff($this->fillable, ['setting_id','locale','created_at','updated_at']);
//    }




}
