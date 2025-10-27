<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('setting_id');
            $table->string('locale')->index();
            $table->string('location');
            $table->string('privacy',1000)->default('');
            $table->string('terms_conditions',1000)->default('');
            $table->string('work_times',500)->default('');
            $table->string('rights_maids',1000);
            $table->string('rights_users',1000);
            $table->string('copyright',1000)->default('');
            $table->string('website_name');
            $table->string('about_us_sub_title')->default('');
            $table->string('about_us_app',1000)->default('');
            $table->string('footer_text')->default('');
            $table->unique(['setting_id', 'locale']);
            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_translations');
    }
}
