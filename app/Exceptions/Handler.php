<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Exception;

// Model
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Models\Setting;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->is('admin/*')) {
                return response()->view('errors.admin.404');
            } else if ($request->is('*')) {
                // Settings for exception pages
                try{
                    $setting_list = Setting::pluck('setting_value', 'setting_name')->all();
                    $data = [
                        'settings' => $setting_list,
                    ];
                    \View::share($data);
                }catch(Exception $e){}
            }
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
