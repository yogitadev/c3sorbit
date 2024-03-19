<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\person\students\IndexController;
// use App\Http\Controllers\admin\person\students\CreateController;
// use App\Http\Controllers\admin\person\students\StoreController;
// use App\Http\Controllers\admin\person\students\EditController;
// use App\Http\Controllers\admin\person\students\UpdateController;
// use App\Http\Controllers\admin\person\students\DeleteController;
// use App\Http\Controllers\admin\person\students\ReorderController;
// use App\Http\Controllers\admin\person\students\UpdateOrderController;
use App\Http\Controllers\admin\person\students\ViewController;

Route::group(['prefix' => 'students'], function ($router) {

    Route::get('/', IndexController::class)->name('student-list');

    //View 
    Route::get('/{unique_id}/view', ViewController::class)->name('view-student');

    // Create
    // Route::get('/create', CreateController::class)->name('create-student');
    // Route::post('/create', StoreController::class);

    // // Edit
    // Route::get('/{unique_id}/edit', EditController::class)->name('edit-student');
    // Route::put('/{unique_id}/edit', UpdateController::class);

    // Reorder
    // Route::get('/reorder', ReorderController::class)->name('reorder-student');
    // Route::post('/reorder', UpdateOrderController::class);

    // // Delete
    // Route::delete('/{unique_id}', DeleteController::class)->name('delete-student');
});
