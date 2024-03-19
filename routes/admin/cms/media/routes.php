<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\cms\media\IndexController;
use App\Http\Controllers\admin\cms\media\UploadController;
use App\Http\Controllers\admin\cms\media\DeleteController;




Route::group(['prefix' => 'media'], function ($router) {

    Route::get('/', IndexController::class)->name('media-list');

    // Upload
    Route::post('/', UploadController::class);

    // Delete
    Route::delete('/{unique_id}', DeleteController::class)->name('delete-media');
});
