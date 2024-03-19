<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\campaign\campus\IndexController;
use App\Http\Controllers\admin\campaign\campus\CreateController;
use App\Http\Controllers\admin\campaign\campus\StoreController;
use App\Http\Controllers\admin\campaign\campus\EditController;
use App\Http\Controllers\admin\campaign\campus\UpdateController;
use App\Http\Controllers\admin\campaign\campus\ReorderController;
use App\Http\Controllers\admin\campaign\campus\UpdateOrderController;
use App\Http\Controllers\admin\campaign\campus\DeleteController;


Route::group(['prefix' => 'campus'], function ($router) {

    Route::get('/', IndexController::class)->name('campus-list');

    // Create
    Route::get('/create', CreateController::class)->name('create-campus');
    Route::post('/create', StoreController::class);

    // Edit
    Route::get('/{unique_id}/edit', EditController::class)->name('edit-campus');
    Route::put('/{unique_id}/edit', UpdateController::class);

    // Reorder
    Route::get('/reorder', ReorderController::class)->name('reorder-campus');
    Route::post('/reorder', UpdateOrderController::class);

    // Delete
    Route::delete('/{unique_id}', DeleteController::class)->name('delete-campus');
});
