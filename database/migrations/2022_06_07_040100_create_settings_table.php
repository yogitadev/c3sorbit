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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->enum('setting_type', ['Input', 'Textarea'])->default('Input');
            $table->string('setting_name')->nullable();
            $table->string('setting_title')->nullable();
            $table->text('setting_value')->nullable();
            $table->enum('setting_required', ['No', 'Yes'])->default('No');
            $table->string('setting_help_text')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
