<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\cms\countries\IndexController;
use App\Http\Controllers\admin\cms\countries\CreateController;
use App\Http\Controllers\admin\cms\countries\StoreController;
use App\Http\Controllers\admin\cms\countries\EditController;
use App\Http\Controllers\admin\cms\countries\UpdateController;
use App\Http\Controllers\admin\cms\countries\ReorderController;
use App\Http\Controllers\admin\cms\countries\UpdateOrderController;
use App\Http\Controllers\admin\cms\countries\DeleteController;


Route::group(['prefix' => 'countries'], function ($router) {

    Route::get('/', IndexController::class)->name('country-list');

    // Create
    Route::get('/create', CreateController::class)->name('create-country');
    Route::post('/create', StoreController::class);

    // Edit
    Route::get('/{id}/edit', EditController::class)->name('edit-country');
    Route::put('/{id}/edit', UpdateController::class);

    // Reorder
    Route::get('/reorder', ReorderController::class)->name('reorder-country');
    Route::post('/reorder', UpdateOrderController::class);

    // Delete
    Route::delete('/{id}', DeleteController::class)->name('delete-country');
});
