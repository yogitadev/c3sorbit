<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\cms\subjects\IndexController;
use App\Http\Controllers\admin\cms\subjects\CreateController;
use App\Http\Controllers\admin\cms\subjects\StoreController;
use App\Http\Controllers\admin\cms\subjects\EditController;
use App\Http\Controllers\admin\cms\subjects\UpdateController;
use App\Http\Controllers\admin\cms\subjects\ReorderController;
use App\Http\Controllers\admin\cms\subjects\UpdateOrderController;
use App\Http\Controllers\admin\cms\subjects\DeleteController;


Route::group(['prefix' => 'subjects'], function ($router) {

    Route::get('/', IndexController::class)->name('subject-list');

    // Create
    Route::get('/create', CreateController::class)->name('create-subject');
    Route::post('/create', StoreController::class);

    // Edit
    Route::get('/{unique_id}/edit', EditController::class)->name('edit-subject');
    Route::put('/{unique_id}/edit', UpdateController::class);

    // Reorder
    Route::get('/reorder', ReorderController::class)->name('reorder-subject');
    Route::post('/reorder', UpdateOrderController::class);

    // Delete
    Route::delete('/{unique_id}', DeleteController::class)->name('delete-subject');
});
