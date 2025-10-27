<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiographiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biographies', function (Blueprint $table) {
            $table->id();

            $table->enum('status',['new','under_work','finished','canceled'])
                ->default('new');


            $table->enum('type_of_experience',['new','with_experience'])
                ->default('new')->comment('new=>قادم جديد , with_experience=>لديه خبرة جديدة ');

            $table->enum('order_type',['normal','special'])
                ->default('normal')->comment('normal=>سيرة عادى , special=>طلب من نوع خاص ');


            $table->string('cv_file')->nullable()->comment('ملف السيرة الذاتية');

            $table->unsignedBigInteger('recruitment_office_id')
                ->nullable()
                ->comment('مكتب السيرة الذاتية');
            $table->foreign('recruitment_office_id')
                ->references('id')->on('recruitment_offices')
                ->onDelete('cascade');


            $table->unsignedBigInteger('nationalitie_id')
                ->nullable()
                ->comment('الجنسية');
            $table->foreign('nationalitie_id')
                ->references('id')->on('nationalities')
                ->onDelete('cascade');


            $table->unsignedBigInteger('language_title_id')
                ->nullable()
                ->comment('اللغة التى يتحدث بها العامل');
            $table->foreign('language_title_id')
                ->references('id')->on('language_titles')
                ->onDelete('cascade');

            $table->unsignedBigInteger('religion_id')
                ->nullable()
                ->comment('الدين');
            $table->foreign('religion_id')
                ->references('id')->on('religions')
                ->onDelete('cascade');


            $table->unsignedBigInteger('job_id')
                ->nullable()
                ->comment('المهنة');
            $table->foreign('job_id')
                ->references('id')->on('jobs')
                ->onDelete('cascade');


            $table->unsignedBigInteger('social_type_id')
                ->nullable()
                ->comment('الحالة الاجتماعية');
            $table->foreign('social_type_id')
                ->references('id')->on('social_types')
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


            $table->integer('age')->default(0);
            $table->double('salary')->default(0);
            $table->double('recruitment_price')->default(0)->comment('سعر الإستقدام');
            $table->string('biography_number')->nullable()->comment('رقم سجل السيرة الذاتية');
            $table->string('passport_number')->nullable()->comment('رقم جواز السفر');
            $table->string('tfeez_number')->nullable()->comment('رقم التفييز');
            $table->text('special_requirement')->nullable()->comment('متطلبات خاصة');

            $table->unsignedBigInteger('order_of_age_id')
                ->nullable()
                ->comment(' رنج العمر المطلوب فى حالة الطلب الخاص');
            $table->foreign('order_of_age_id')
                ->references('id')->on('ages')
                ->onDelete('cascade');

            $table->timestamps();
        });

        \DB::statement("ALTER TABLE `biographies` comment ' السيرة الذاتية و طلبات السير الذاتية الخاصة'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biographies');
    }
}
