<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('develop_settings', function (Blueprint $table) {
            $table->id();
            $table->string('copyrights');
            $table->string('name');
            $table->string('portfolio_url');
            $table->string('licences_url');
            $table->string('support_url');
            $table->string('faq_url');
            $table->string('home_url');
            $table->string('about_url');
            $table->boolean('translation_show')->default(0);
            $table->text('login_text');
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
        Schema::dropIfExists('develop_settings');
    }
}
