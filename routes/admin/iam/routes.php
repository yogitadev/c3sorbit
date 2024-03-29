<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'iam'], function ($router) {

    // Roles
    require base_path('routes/admin/iam/roles/routes.php');

    // Modules
    require base_path('routes/admin/iam/modules/routes.php');
    
    //Personnel
    require base_path('routes/admin/iam/personnel/routes.php');
});
