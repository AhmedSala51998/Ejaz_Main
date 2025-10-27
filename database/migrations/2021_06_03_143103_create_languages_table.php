<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->enum('is_active',['active','not_active'])->default('active')->nullable();
            $table->timestamps();

        });

        \DB::statement("ALTER TABLE `languages` comment 'اللغات خاصة بالاضافة كاعداد'");
        \DB::statement("INSERT INTO `languages` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'ar', 'active', '2022-03-27 13:57:36', '2022-03-27 13:57:36'),
(2, 'en', 'active', '2022-03-27 13:57:36', '2022-03-27 13:57:36');
");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
