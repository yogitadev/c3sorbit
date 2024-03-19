<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\iam\personnel\IndexController;
use App\Http\Controllers\admin\iam\personnel\CreateController;
use App\Http\Controllers\admin\iam\personnel\StoreController;
use App\Http\Controllers\admin\iam\personnel\EditController;
use App\Http\Controllers\admin\iam\personnel\UpdateController;
use App\Http\Controllers\admin\iam\personnel\DeleteController;


Route::group(['prefix' => 'personnels'], function ($router) {

    Route::get('/', IndexController::class)->name('personnel-list');

    // Create
    Route::get('/create', CreateController::class)->name('create-personnel');
    Route::post('/create', StoreController::class);

    // // Edit
    Route::get('/{unique_id}/edit', EditController::class)->name('edit-personnel');
    Route::put('/{unique_id}/edit', UpdateController::class);

    // // Delete
    Route::delete('/{unique_id}', DeleteController::class)->name('delete-personnel');
});
