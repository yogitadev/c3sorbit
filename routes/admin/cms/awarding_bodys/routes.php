<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\cms\awarding_bodys\IndexController;
use App\Http\Controllers\admin\cms\awarding_bodys\CreateController;
use App\Http\Controllers\admin\cms\awarding_bodys\StoreController;
use App\Http\Controllers\admin\cms\awarding_bodys\EditController;
use App\Http\Controllers\admin\cms\awarding_bodys\UpdateController;
use App\Http\Controllers\admin\cms\awarding_bodys\ReorderController;
use App\Http\Controllers\admin\cms\awarding_bodys\UpdateOrderController;
use App\Http\Controllers\admin\cms\awarding_bodys\DeleteController;


Route::group(['prefix' => 'awarding-bodys'], function ($router) {

    Route::get('/', IndexController::class)->name('awarding-body-list');

    // Create
    Route::get('/create', CreateController::class)->name('create-awarding-body');
    Route::post('/create', StoreController::class);

    // Edit
    Route::get('/{unique_id}/edit', EditController::class)->name('edit-awarding-body');
    Route::put('/{unique_id}/edit', UpdateController::class);

    // Reorder
    Route::get('/reorder', ReorderController::class)->name('reorder-awarding-body');
    Route::post('/reorder', UpdateOrderController::class);

    // Delete
    Route::delete('/{unique_id}', DeleteController::class)->name('delete-awarding-body');
});
