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
        Schema::table('roles', function (Blueprint $table) {
            $table->string('unique_id',50)->nullable()->unique()->after('id');
            $table->string('short_name')->nullable()->after('guard_name');
            $table->enum('status', ['Active', 'Inactive'])->after('guard_name');
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
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('unique_id');
            $table->dropColumn([
                'short_name',
            ]);
            $table->dropColumn('status');
            $table->dropColumn('sort_order');
        });
    }
};
