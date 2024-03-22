<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\cms\lecture_schedules\IndexController;
use App\Http\Controllers\admin\cms\lecture_schedules\CreateController;
use App\Http\Controllers\admin\cms\lecture_schedules\StoreController;
use App\Http\Controllers\admin\cms\lecture_schedules\ViewController;
use App\Http\Controllers\admin\cms\lecture_schedules\ViewSaveController;
use App\Http\Controllers\admin\cms\lecture_schedules\EditController;
use App\Http\Controllers\admin\cms\lecture_schedules\UpdateController;
use App\Http\Controllers\admin\cms\lecture_schedules\ReorderController;
use App\Http\Controllers\admin\cms\lecture_schedules\UpdateOrderController;
use App\Http\Controllers\admin\cms\lecture_schedules\DeleteController;


Route::group(['prefix' => 'lecture-schedules'], function ($router) {

    Route::get('/', IndexController::class)->name('lecture-schedule-list');

    // Create
    Route::get('/create', CreateController::class)->name('create-lecture-schedule');
    Route::post('/create', StoreController::class);

    // Edit
    Route::get('/{unique_id}/edit', EditController::class)->name('edit-lecture-schedule');
    Route::put('/{unique_id}/edit', UpdateController::class);

    //View
    Route::get('/{unique_id}/view', ViewController::class)->name('view-lecture-schedule');
    Route::put('/{unique_id}/view', ViewSaveController::class);

    // Reorder
    Route::get('/reorder', ReorderController::class)->name('reorder-lecture-schedule');
    Route::post('/reorder', UpdateOrderController::class);

    // Delete
    Route::delete('/{unique_id}', DeleteController::class)->name('delete-lecture-schedule');
});
