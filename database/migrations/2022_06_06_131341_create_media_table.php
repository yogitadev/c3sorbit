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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id',50)->unique()->nullable();

            $table->enum('media_type', ['media', 'document']);

            $table->string('title')->nullable();
            $table->string('file_name')->nullable();
            $table->string('original_file_name')->nullable();

            $table->string('file_type')->nullable();
            $table->string('file_extension')->nullable();

            $table->bigInteger('file_size')->nullable();

            $table->string('folder_name')->nullable();

            $table->bigInteger('height')->nullable();
            $table->bigInteger('width')->nullable();

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
        Schema::dropIfExists('media');
    }
};
