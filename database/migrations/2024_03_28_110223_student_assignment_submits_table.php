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
        Schema::create('student_assignment_submits', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id',50)->nullable()->unique();

            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('SET NULL');

            $table->bigInteger('subject_id')->unsigned()->nullable();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('SET NULL');

            $table->bigInteger('assignment_id')->unsigned()->nullable();
            $table->foreign('assignment_id')->references('id')->on('assignments')->onDelete('SET NULL');

            $table->bigInteger('media_id')->unsigned()->nullable();
            $table->foreign('media_id')->references('id')->on('media')->onDelete('SET NULL');

            $table->text('remark')->nullable();
            $table->date('submission_date')->nullable();
            
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
        Schema::dropIfExists('student_assignment_submits');
    }
};
