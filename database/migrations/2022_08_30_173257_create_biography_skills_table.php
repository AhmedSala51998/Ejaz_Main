<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiographySkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biography_skills', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('biography_id')
                ->nullable()
                ->comment(' السيرة الذاتية');
            $table->foreign('biography_id')
                ->references('id')->on('biographies')
                ->onDelete('cascade');



            $table->unsignedBigInteger('skill_id')
                ->nullable()
                ->comment(' المهارات');
            $table->foreign('skill_id')
                ->references('id')->on('skills')
                ->onDelete('cascade');
            $table->timestamps();
        });

        \DB::statement("ALTER TABLE `biography_skills` comment ' المهارات للسير الذاتية'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biography_skills');
    }
}
