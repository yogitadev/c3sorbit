<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\profile\IndexController;
use App\Http\Controllers\admin\profile\UpdateProfileController;
use App\Http\Controllers\admin\profile\ChangePasswordController;



Route::get('/profile', IndexController::class)->name('admin-profile');
Route::post('/profile', UpdateProfileController::class);
Route::post('/update-password', ChangePasswordController::class)->name('admin-update-password');
