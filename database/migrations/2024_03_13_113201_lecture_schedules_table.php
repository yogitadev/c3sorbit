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
        Schema::create('lecture_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id',50)->nullable()->unique();

            $table->bigInteger('programcode_id')->unsigned()->nullable();
            $table->foreign('programcode_id')->references('id')->on('programcodes')->onDelete('SET NULL');

            $table->bigInteger('subject_id')->unsigned()->nullable();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('SET NULL');

            $table->date('lecture_date');
            $table->time('lecture_time');

            $table->enum('status', ['Active', 'Inactive','Deleted']);
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
        Schema::dropIfExists('lecture_schedules');
    }
};
