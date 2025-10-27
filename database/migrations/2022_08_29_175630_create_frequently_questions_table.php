<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrequentlyQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frequently_questions', function (Blueprint $table) {
            $table->id();

            $table->string('title',500)->nullable();
            $table->text('desc')->nullable();

            $table->timestamps();
        });

        \DB::statement("ALTER TABLE `frequently_questions` comment 'الاسئلة الشائعة فى الصفحة الرئيسة'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frequently_questions');
    }
}
