<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_titles', function (Blueprint $table) {
            $table->id();
            $table->string('title',500)->nullable();

            $table->timestamps();
        });
        \DB::statement("ALTER TABLE `language_titles` comment 'اللغات  للسيرة الذاتية'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_titles');
    }
}
