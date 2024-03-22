<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\iam\roles\IndexController;
use App\Http\Controllers\admin\iam\roles\CreateController;
use App\Http\Controllers\admin\iam\roles\StoreController;
use App\Http\Controllers\admin\iam\roles\EditController;
use App\Http\Controllers\admin\iam\roles\UpdateController;
use App\Http\Controllers\admin\iam\roles\DeleteController;
use App\Http\Controllers\admin\iam\roles\ReorderController;
use App\Http\Controllers\admin\iam\roles\UpdateOrderController;
use App\Http\Controllers\admin\iam\roles\ShowController;
use App\Http\Controllers\admin\iam\roles\ReAssignRolesController;
use App\Http\Controllers\admin\iam\roles\PermissionController;
use App\Http\Controllers\admin\iam\roles\UpdatePermissionController;

Route::group(['prefix' => 'roles'], function ($router) {

    Route::get('/', IndexController::class)->name('role-list');

    Route::get('/re-assign', ReAssignRolesController::class)->name('role-re-assign');

    // Create
    Route::get('/create', CreateController::class)->name('create-role');
    Route::post('/create', StoreController::class);

    // Edit
    Route::get('/{unique_id}/edit', EditController::class)->name('edit-role');
    Route::put('/{unique_id}/edit', UpdateController::class);

    // Reorder
    Route::get('/reorder', ReorderController::class)->name('reorder-role');
    Route::post('/reorder', UpdateOrderController::class);

    // Show
    Route::get('/{unique_id}/view', ShowController::class)->name('view-role');


     // Show
     Route::get('/{unique_id}/permissions', PermissionController::class)->name('view-role-permissions');
     Route::post('/{unique_id}/permissions', UpdatePermissionController::class);

    // Delete
    Route::delete('/{unique_id}', DeleteController::class)->name('delete-role');
});
