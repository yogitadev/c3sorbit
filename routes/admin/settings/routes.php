<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\settings\IndexController;
use App\Http\Controllers\admin\settings\UpdateController;



Route::get('/settings', IndexController::class)->name('admin-setting');
Route::post('/settings', UpdateController::class);
