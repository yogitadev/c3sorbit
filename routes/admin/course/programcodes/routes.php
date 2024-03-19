<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\course\programcodes\IndexController;
use App\Http\Controllers\admin\course\programcodes\CreateController;
use App\Http\Controllers\admin\course\programcodes\StoreController;
use App\Http\Controllers\admin\course\programcodes\EditController;
use App\Http\Controllers\admin\course\programcodes\UpdateController;
use App\Http\Controllers\admin\course\programcodes\ReorderController;
use App\Http\Controllers\admin\course\programcodes\UpdateOrderController;
use App\Http\Controllers\admin\course\programcodes\DeleteController;


Route::group(['prefix' => 'programcodes'], function ($router) {

    Route::get('/', IndexController::class)->name('programcode-list');

    // Create
    Route::get('/create', CreateController::class)->name('create-programcode');
    Route::post('/create', StoreController::class);

    // Edit
    Route::get('/{unique_id}/edit', EditController::class)->name('edit-programcode');
    Route::put('/{unique_id}/edit', UpdateController::class);

    // Reorder
    Route::get('/reorder', ReorderController::class)->name('reorder-programcode');
    Route::post('/reorder', UpdateOrderController::class);

    // Delete
    Route::delete('/{unique_id}', DeleteController::class)->name('delete-programcode');
});
