<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programcodes', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id',50)->nullable()->unique();

            $table->bigInteger('institution_id')->unsigned()->nullable();
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('SET NULL');

            $table->bigInteger('campus_id')->unsigned()->nullable();
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('SET NULL');

            $table->string('program_code')->nullable();

            $table->bigInteger('awarding_body_id')->unsigned()->nullable();
            $table->foreign('awarding_body_id')->references('id')->on('awarding_bodys')->onDelete('CASCADE');

            $table->string('course_duration')->nullable();
            $table->string('uk_credit')->nullable();
            $table->string('ects_credit')->nullable();
            
            $table->enum('eng_program', ['Yes', 'No'])->nullable();
            $table->string('eng_course_duration')->nullable();
            $table->string('eng_course_fees')->nullable();
            $table->string('eu_tution_fee')->nullable();
            $table->string('eu_app_fee')->nullable();
            $table->string('eu_year_fee')->nullable();
            $table->string('non_eu_tutuion_fee')->nullable();
            $table->string('non_eu_app_fee')->nullable();
            $table->string('non_eu_year_fee')->nullable();
            $table->string('online_tutuion_fee')->nullable();
            $table->string('online_app_fee')->nullable();
            $table->string('online_year_fee')->nullable();
            
            $table->bigInteger('media_id')->unsigned()->nullable();
            $table->foreign('media_id')->references('id')->on('media')->onDelete('SET NULL');

            $table->string('program_name')->nullable();
            $table->string('program_name_spanish')->nullable();
            
            $table->enum('status', ['Active', 'Inactive']);
            $table->integer('sort_order')->default(0);
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
        Schema::dropIfExists('programcodes');
    }
};
