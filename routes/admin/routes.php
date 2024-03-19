<?php

use Illuminate\Support\Facades\Route;

/**
 *
 * Group: admin
 * Description: Routes For Admin
 * Domain:
 *
 */


Route::group([], function ($router) {

    // Auth
    require base_path('routes/admin/auth/routes.php');


    Route::group(['middleware' => ['App\Http\Middleware\AdminMiddleware']], function ($router) {
        // Dashboard
        require base_path('routes/admin/dashboard/routes.php');

        // Profile
        require base_path('routes/admin/profile/routes.php');

        // CMS
        require base_path('routes/admin/cms/routes.php');

        //Campaign
        require base_path('routes/admin/campaign/routes.php');

        //Course
        require base_path('routes/admin/course/routes.php');
        
        // Person
        require base_path('routes/admin/person/routes.php');

        // IAM
        require base_path('routes/admin/iam/routes.php');

        // Settings
        require base_path('routes/admin/settings/routes.php');

        Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
    });
});
