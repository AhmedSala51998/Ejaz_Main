<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('logo_header')->default('logo_header.png');
            $table->string('logo_footer')->default('logo_footer.png');
            $table->string('favicon')->default('favicon.png');
            $table->string('twitter')->default('#');
            $table->string('facebook')->default('#');
            $table->string('instagram')->default('#');
            $table->string('snapchat')->default('#');
            $table->string('linkedin')->default('#');
            $table->string('youtube')->default('#');
            $table->string('whatsapp')->default('#');
            $table->string('email')->default('#');
            $table->string('phone')->default('#');
            $table->string('about_image');
            $table->string('other_phone')->default('#');
            $table->string('map_link')->default('#');
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
        Schema::dropIfExists('settings');
    }
}
