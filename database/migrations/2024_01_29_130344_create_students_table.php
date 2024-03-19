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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id',50)->nullable()->unique();
            $table->integer('vista_id')->start_from(1)->default(0);
            $table->date('lead_date');
            $table->time('lead_time');

            $table->string('name')->nullable();

            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('SET NULL');

            $table->string('country_code')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email_id')->nullable();

            $table->bigInteger('programcode_id')->unsigned()->nullable();
            $table->foreign('programcode_id')->references('id')->on('programcodes')->onDelete('SET NULL');

            $table->string('v_reference_no')->nullable();

            $table->enum('status', ['Active', 'Inactive','Deleted']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
