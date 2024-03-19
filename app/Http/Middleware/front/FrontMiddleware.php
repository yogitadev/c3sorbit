<?php

namespace App\Http\Middleware\front;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\Setting;

class FrontMiddleware
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    public $attributes;
    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest(route('front-login'));
            }
        }

        if (!Auth::check()) {
            return redirect(route('front-login'));
        }

        $setting_list = Setting::pluck('setting_value', 'setting_name')->all();

        $settings = $setting_list;
       
        $request->attributes->add(['settings' => $settings]);

        \View::share('settings',$settings);

        return $next($request);
    }
}
