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
        Schema::create('lecture_student_presents', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id',50)->nullable()->unique();

            $table->bigInteger('programcode_id')->unsigned()->nullable();
            $table->foreign('programcode_id')->references('id')->on('programcodes')->onDelete('SET NULL');

            $table->bigInteger('subject_id')->unsigned()->nullable();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('SET NULL');

            $table->bigInteger('lecture_id')->unsigned()->nullable();
            $table->foreign('lecture_id')->references('id')->on('lecture_schedules')->onDelete('SET NULL');

            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('SET NULL');

            $table->date('lecture_date')->nullable();

            $table->enum('status', ['Present', 'Absent']);
            
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
        Schema::dropIfExists('lecture_student_presents');
    }
};
