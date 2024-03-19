<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\person\faculties\IndexController;
use App\Http\Controllers\admin\person\faculties\CreateController;
use App\Http\Controllers\admin\person\faculties\StoreController;
use App\Http\Controllers\admin\person\faculties\EditController;
use App\Http\Controllers\admin\person\faculties\UpdateController;
use App\Http\Controllers\admin\person\faculties\DeleteController;
use App\Http\Controllers\admin\person\faculties\ReorderController;
use App\Http\Controllers\admin\person\faculties\UpdateOrderController;

Route::group(['prefix' => 'faculties'], function ($router) {

    Route::get('/', IndexController::class)->name('faculty-list');

    // Create
    Route::get('/create', CreateController::class)->name('create-faculty');
    Route::post('/create', StoreController::class);

    // // Edit
    Route::get('/{unique_id}/edit', EditController::class)->name('edit-faculty');
    Route::put('/{unique_id}/edit', UpdateController::class);

    // Reorder
    Route::get('/reorder', ReorderController::class)->name('reorder-faculty');
    Route::post('/reorder', UpdateOrderController::class);

    // // Delete
    Route::delete('/{unique_id}', DeleteController::class)->name('delete-faculty');
});
