<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiographyImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biography_images', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('biography_id')
                ->nullable()
                ->comment(' السيرة الذاتية');
            $table->foreign('biography_id')
                ->references('id')->on('biographies')
                ->onDelete('cascade');

            $table->string('image')->nullable();

            $table->timestamps();
        });

        \DB::statement("ALTER TABLE `biography_images` comment ' صور السير الذاتية'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biography_images');
    }
}
