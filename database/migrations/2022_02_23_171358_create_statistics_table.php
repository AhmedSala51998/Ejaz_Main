<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('title',500)->nullable();
            $table->string('icon',500)->nullable();
            $table->string('number',500)->nullable();
            $table->timestamps();
        });

        \DB::statement("ALTER TABLE `statistics` comment 'الاحصائيات فى الصفحة الرئيسة'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistics');
    }
}
