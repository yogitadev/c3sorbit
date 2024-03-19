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
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id',50)->nullable()->unique();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();

            $table->enum('gender', ['Male', 'Female', 'Not Prefer']);

            $table->date('dob');
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();

            $table->string('altenative_email')->nullable();
            $table->string('alternative_mobile_number')->nullable();

            $table->bigInteger('media_id')->unsigned()->nullable();
            $table->foreign('media_id')->references('id')->on('media')->onDelete('SET NULL');

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
        Schema::dropIfExists('faculties');
    }
};
