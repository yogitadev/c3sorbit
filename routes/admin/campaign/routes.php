<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'campaign'], function ($router) {

    // Institutions
    require base_path('routes/admin/campaign/institutions/routes.php');

    // Campus
    require base_path('routes/admin/campaign/campus/routes.php');

});
