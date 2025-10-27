<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_types', function (Blueprint $table) {
            $table->id();
            $table->string('title',500)->nullable();
            $table->timestamps();
        });

        \DB::statement("ALTER TABLE `social_types` comment 'الحالة الاجتماعية  للسيرة الذاتية'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_types');
    }
}
