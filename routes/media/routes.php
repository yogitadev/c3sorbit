<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\media\FitController;
use App\Http\Controllers\media\FitWebpController;
use App\Http\Controllers\media\ResizeController;

use App\Http\Controllers\media\ResizeHeightController;
use App\Http\Controllers\media\ResizeWebpHeightController;

use App\Http\Controllers\media\ResizeWidthController;
use App\Http\Controllers\media\ResizeWebpWidthController;


Route::group(['prefix' => 'media'], function ($router) {
    Route::get('/fit/{h}x{w}/{file_name}', FitController::class)->name('fit-media');
    Route::get('/fit/webp/{h}x{w}/{file_name}', FitWebpController::class)->name('fit-webp-media');
    Route::get('/resize/{h}x{w}/{file_name}', ResizeController::class)->name('resize-media');

    // Resize By Height
    Route::get('/resize/height/{h}/{file_name}', ResizeHeightController::class)->name('resize-media-by-height');
    Route::get('/resize/webp/height/{h}/{file_name}', ResizeWebpHeightController::class)->name('resize-webp-media-by-height');
    // Resize By Width
    Route::get('/resize/width/{w}/{file_name}', ResizeWidthController::class)->name('resize-media-by-width');
    Route::get('/resize/webp/width/{w}/{file_name}', ResizeWebpWidthController::class)->name('resize-webp-media-by-width');
});
