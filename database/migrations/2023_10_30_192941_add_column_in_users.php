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
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('role_id')->unsigned()->nullable()->after('unique_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('SET NULL');
            $table->enum('status', ['Active', 'Inactive'])->after('remember_token');
            $table->integer('sort_order')->default(0)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_role_id_foreign');
            $table->dropColumn([
                'role_id',
            ]);
            $table->dropColumn('status');
            $table->dropColumn('sort_order');
        });
    }
};
