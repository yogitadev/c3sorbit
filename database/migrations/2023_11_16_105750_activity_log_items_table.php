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
        Schema::create('activity_log_items', function (Blueprint $table) {
            $table->id();

            $table->string('unique_id')->unique()->nullable();

            $table->bigInteger('activity_log_id')->unsigned()->nullable();
            $table->foreign('activity_log_id')->references('id')->on('activity_logs')->onDelete('CASCADE');

            $table->string('subject')->nullable();

            $table->bigInteger('subject_id')->nullable();

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
        Schema::dropIfExists('activity_log_items');
    }
};
