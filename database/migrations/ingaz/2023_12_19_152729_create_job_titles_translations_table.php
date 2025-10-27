<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTitlesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_titles_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_title_id');
            $table->string('title'); // Adjust this column based on your actual requirements
            $table->string('locale');

            $table->unique(['job_title_id', 'locale']);
            $table->foreign('job_title_id')->references('id')->on('job_titles')->onDelete('cascade');
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
        Schema::dropIfExists('job_titles_translations');
    }
}
