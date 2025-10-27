<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('title',500)->nullable();
            $table->longText('desc')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        \DB::statement("ALTER TABLE `sponsors` comment 'الرعاة فى الصفحة الرئيسة'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsors');
    }
}
