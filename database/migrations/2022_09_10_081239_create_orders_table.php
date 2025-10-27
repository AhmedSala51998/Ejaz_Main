<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('order_code')->nullable();
            $table->enum('status',['new','under_work','finished','canceled'])
                ->default('new');

            $table->unsignedBigInteger('biography_id')
                ->nullable()
                ->comment(' السيرة الذاتية');
            $table->foreign('biography_id')
                ->references('id')->on('biographies')
                ->onDelete('cascade');


            $table->unsignedBigInteger('admin_id')
                ->nullable()
                ->comment('ممثل خدمة العملاء');
            $table->foreign('admin_id')
                ->references('id')->on('admins')
                ->onDelete('cascade');

            $table->unsignedBigInteger('user_id')
                ->nullable()
                ->comment('العميل لو حجز العامل');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->timestamp('order_date')->nullable();
            $table->timestamp('order_complete')->nullable();
            $table->timestamp('order_canceled')->nullable();


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
        Schema::dropIfExists('orders');
    }
}
