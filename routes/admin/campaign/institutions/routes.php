<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\campaign\institutions\IndexController;
use App\Http\Controllers\admin\campaign\institutions\CreateController;
use App\Http\Controllers\admin\campaign\institutions\StoreController;
use App\Http\Controllers\admin\campaign\institutions\EditController;
use App\Http\Controllers\admin\campaign\institutions\UpdateController;
use App\Http\Controllers\admin\campaign\institutions\ReorderController;
use App\Http\Controllers\admin\campaign\institutions\UpdateOrderController;
use App\Http\Controllers\admin\campaign\institutions\DeleteController;


Route::group(['prefix' => 'institutions'], function ($router) {

    Route::get('/', IndexController::class)->name('institution-list');

    // Create
    Route::get('/create', CreateController::class)->name('create-institution');
    Route::post('/create', StoreController::class);

    // Edit
    Route::get('/{unique_id}/edit', EditController::class)->name('edit-institution');
    Route::put('/{unique_id}/edit', UpdateController::class);

    // Reorder
    Route::get('/reorder', ReorderController::class)->name('reorder-institution');
    Route::post('/reorder', UpdateOrderController::class);

    // Delete
    Route::delete('/{unique_id}', DeleteController::class)->name('delete-institution');
});
