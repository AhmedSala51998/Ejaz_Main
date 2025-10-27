<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('tap_logo')->nullable()->comment('مطلوب');
            $table->string('header_logo')->nullable()->comment('مطلوب');
            $table->string('footer_logo')->nullable()->comment('مطلوب');

            $table->string('title',500)->nullable()->comment('مطلوب');

            $table->longText('footer_desc')->nullable()->comment('مطلوب');

            $table->string('phone1')->nullable()->comment('مطلوب');
            $table->string('phone2')->nullable()->comment('مطلوب');

            $table->string('address1',500)->nullable()->comment('مطلوب');
            $table->string('address2',500)->nullable();

            $table->double('latitude')->default(0)->comment('مطلوب');
            $table->double('longitude')->default(0)->comment('مطلوب');
            $table->string('email1')->nullable()->comment('مطلوب');
            $table->string('email2')->nullable();

            $table->string('our_service_desc',500)->nullable()->comment('مطلوب');

            $table->string('our_family_title1',500)->nullable()->comment('مطلوب');
            $table->string('our_family_desc1',500)->nullable()->comment('مطلوب');
            $table->string('our_family_image1')->nullable()->comment('مطلوب');


            $table->string('our_family_title2',500)->nullable()->comment('مطلوب');
            $table->string('our_family_desc2',500)->nullable()->comment('مطلوب');
            $table->string('our_family_image2')->nullable()->comment('مطلوب');

            $table->string('our_statistics_desc',500)->nullable()->comment(' نص الاحصائيات مطلوب');

            $table->text('recruitment_step_desc')->nullable()->comment('   مطلوب');
            $table->text('recruitment_step1_desc')->nullable()->comment('   مطلوب');
            $table->text('recruitment_step2_desc')->nullable()->comment('   مطلوب');
            $table->text('recruitment_step3_desc')->nullable()->comment('   مطلوب');
            $table->text('recruitment_step4_desc')->nullable()->comment('   مطلوب');
            $table->text('recruitment_step5_desc')->nullable()->comment('   مطلوب');

            $table->string('application_for_the_recruitment',500)->nullable()->comment('   مطلوب');


            $table->longText('desc')->nullable();

            $table->string('terms_condition_link')->nullable();
            $table->string('about_us_link')->nullable();
            $table->string('privacy_policy_link')->nullable();

            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('telegram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('snapchat_ghost')->nullable();
            $table->string('whatsapp')->nullable();

            $table->longText('about_app')->nullable();
            $table->longtext('terms_condition')->nullable();
            $table->longText('privacy_policy')->nullable();


            $table->string('login_banner')->nullable();
            $table->string('image_slider')->nullable();
            $table->string('company_profile_pdf')->nullable();


            $table->string('fax')->nullable();
            $table->string('android_app')->nullable();
            $table->string('ios_app')->nullable();
            $table->string('link')->nullable();
            $table->string('sms_user_name')->nullable();
            $table->string('sms_user_pass')->nullable();
            $table->string('sms_sender')->nullable();
            $table->string('publisher')->nullable();
            $table->string('default_language')->default('ar');
            $table->string('default_theme')->nullable();
            $table->string('offer_muted')->nullable();
            $table->integer('offer_notification')->default(1);


            $table->timestamps();
        });

        \App\Models\Setting::create([
            'id'=>1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
