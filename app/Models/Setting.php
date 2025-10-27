<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $guarded=[];
    protected $table ='settings';

    public $translatable = [
        'title','footer_desc','our_service_desc',
                            'our_family_title1','our_family_desc1',
                            'our_family_title2','our_family_desc2',
                            'our_statistics_desc','recruitment_step_desc',
                            'recruitment_step1_desc','recruitment_step2_desc',
                            'recruitment_step3_desc','recruitment_step4_desc',
                            'recruitment_step5_desc','address1','application_for_the_recruitment'
    ];

}
