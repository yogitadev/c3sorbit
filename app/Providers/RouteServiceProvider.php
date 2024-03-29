<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Admin Routes
            $this->mapAdminRoutes();

            // Front Routes
            $this->mapFrontRoutes();

            // Media Routes
            $this->mapMediaRoutes();


            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }


    protected function mapAdminRoutes()
    {
        Route::group([
            'namespace' => 'App\Http\Controllers\admin',
            'prefix' => 'admin',
            'middleware' => ['web'],
        ], function ($router) {

            // All Admin Routes
            require base_path('routes/admin/routes.php');
        });
    }

    protected function mapFrontRoutes()
    {
        Route::group([
            'namespace' => 'App\Http\Controllers\front',
            'middleware' => ['web'],
        ], function ($router) {

            // All Front Routes
            //require base_path('routes/front/routes.php');
        });
    }

    protected function mapMediaRoutes()
    {
        Route::group([
            'namespace' => 'App\Http\Controllers\media',
            'middleware' => ['web'],
        ], function ($router) {

            // All Front Routes
            require base_path('routes/media/routes.php');
        });
    }
}
