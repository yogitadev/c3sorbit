<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\dashboard\IndexController;



Route::get('/dashboard', IndexController::class)->name('admin-dashboard');
