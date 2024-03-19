<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'course'], function ($router) {

    // Programcodes
    require base_path('routes/admin/course/programcodes/routes.php');

});
