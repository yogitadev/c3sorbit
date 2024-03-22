<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\iam\modules\IndexController;
use App\Http\Controllers\admin\iam\modules\PermissionController;
use App\Http\Controllers\admin\iam\modules\UpdatePermissionController;

Route::group(['prefix' => 'modules'], function ($router) {

    Route::get('/', IndexController::class)->name('module-list');

    Route::get('/{unique_id}/permission', PermissionController::class)->name('module-permission');
    Route::post('/{unique_id}/permission', UpdatePermissionController::class);

});
