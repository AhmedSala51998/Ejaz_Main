<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationalitiesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nationalities_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nationality_id');
            $table->string('title');
            $table->string('sub_title');
            $table->string('locale');

            $table->unique(['nationality_id', 'locale']);
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
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
        Schema::dropIfExists('nationalities_translations');
    }
}
