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
        Schema::create('campuses', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id',50)->nullable()->unique();

            $table->bigInteger('institution_id')->unsigned()->nullable();
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('SET NULL');

            $table->string('name',50)->nullable();
            
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
        Schema::dropIfExists('campuses');
    }
};
