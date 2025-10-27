<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->enum('type',['normal_user','employer'])
                ->default('normal_user')
                ->comment('normal_user=> عميل عادى  ,employer=>صاحب طلب خاص ');

            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('cascade');

            $table->string('phone_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_iso')->nullable();
            $table->string('phone_county')->nullable();

            $table->string('logo')->nullable();
            $table->string('name',500)->nullable()->comment('الاسم ');
            $table->string('email')->nullable()->comment('البريد الالكترونى unique');
            $table->string('password')->nullable();
            $table->string('phone_activation_code')->nullable();
            $table->timestamp('activated_at')->nullable();

            $table->string('password_rest_code')->nullable();
            $table->string('token',500)->nullable();
            $table->timestamp('confirm_link_expire')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->enum('is_blocked',['blocked','not_blocked'])->default('not_blocked')->nullable();
            $table->enum('is_login',['connected','not_connected'])->default('not_connected')->nullable();
            $table->integer('logout_time')->nullable();
            $table->enum('software_type',['ios','android','web'])->default('web')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
