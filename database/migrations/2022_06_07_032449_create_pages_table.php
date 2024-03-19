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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();

            $table->string('unique_id',50)->nullable()->unique();

            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('pages')->onDelete('SET NULL');

            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();

            $table->string('sub_title')->nullable();

            $table->text('short_content')->nullable();
            $table->text('content')->nullable();

            $table->bigInteger('banner_id')->unsigned()->nullable();
            $table->foreign('banner_id')->references('id')->on('media')->onDelete('SET NULL');

            $table->bigInteger('media_id')->unsigned()->nullable();
            $table->foreign('media_id')->references('id')->on('media')->onDelete('SET NULL');

            $table->bigInteger('about_media_id')->unsigned()->nullable();
            $table->foreign('about_media_id')->references('id')->on('media')->onDelete('SET NULL');

            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_content')->nullable();

            $table->enum('section_required', ['No', 'Yes'])->default('No');

            $table->enum('status', ['Active', 'Inactive']);

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
        Schema::dropIfExists('pages');
    }
};
