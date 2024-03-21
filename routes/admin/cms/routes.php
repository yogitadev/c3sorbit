<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'cms'], function ($router) {

    // Media
    require base_path('routes/admin/cms/media/routes.php');

    //Countries
    require base_path('routes/admin/cms/countries/routes.php');

    //Awarding Bodys
    require base_path('routes/admin/cms/awarding_bodys/routes.php');

    //Subject
    require base_path('routes/admin/cms/subjects/routes.php');

    //Lecture Schedule
    require base_path('routes/admin/cms/lecture_schedules/routes.php');
    
    //Assignment
    require base_path('routes/admin/cms/assignments/routes.php');
});
