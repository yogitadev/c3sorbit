<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\auth\LoginController;
use App\Http\Controllers\admin\auth\LoginCheckController;
use App\Http\Controllers\admin\auth\ForgetPasswordController;
use App\Http\Controllers\admin\auth\SendInvitationPasswordController;
use App\Http\Controllers\admin\auth\ResetPasswordController;
use App\Http\Controllers\admin\auth\UpdatePasswordController;
use App\Http\Controllers\admin\auth\LogoutController;



Route::get('/', LoginController::class)->name('admin-login');
Route::post('/', LoginCheckController::class);
Route::get('/forget-password', ForgetPasswordController::class)->name('admin-forget-password');
Route::post('/forget-password', SendInvitationPasswordController::class);
Route::get('/reset-password/{token}', ResetPasswordController::class)->name('admin-reset-password');
Route::post('/reset-password/{token}', UpdatePasswordController::class);
Route::get('/logout', LogoutController::class)->name('admin-logout');
