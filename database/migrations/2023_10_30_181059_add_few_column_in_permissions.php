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
        Schema::table('permissions', function (Blueprint $table) {
            $table->bigInteger('module_id')->unsigned()->nullable()->after('id');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('SET NULL');

            $table->string('title')->nullable()->after('name');

            $table->enum('permission_to_all',['no','yes']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropForeign('permissions_module_id_foreign');
            $table->dropColumn([
                'module_id',
                'title',
                'permission_to_all',
            ]);
        });
    }
};
