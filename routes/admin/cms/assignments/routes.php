<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\cms\assignments\IndexController;
use App\Http\Controllers\admin\cms\assignments\CreateController;
use App\Http\Controllers\admin\cms\assignments\StoreController;
use App\Http\Controllers\admin\cms\assignments\EditController;
use App\Http\Controllers\admin\cms\assignments\UpdateController;
use App\Http\Controllers\admin\cms\assignments\ReorderController;
use App\Http\Controllers\admin\cms\assignments\UpdateOrderController;
use App\Http\Controllers\admin\cms\assignments\DeleteController;


Route::group(['prefix' => 'assignments'], function ($router) {

    Route::get('/', IndexController::class)->name('assignment-list');

    // Create
    Route::get('/create', CreateController::class)->name('create-assignment');
    Route::post('/create', StoreController::class);

    // Edit
    Route::get('/{unique_id}/edit', EditController::class)->name('edit-assignment');
    Route::put('/{unique_id}/edit', UpdateController::class);

    // Reorder
    Route::get('/reorder', ReorderController::class)->name('reorder-assignment');
    Route::post('/reorder', UpdateOrderController::class);

    // Delete
    Route::delete('/{unique_id}', DeleteController::class)->name('delete-assignment');
});
