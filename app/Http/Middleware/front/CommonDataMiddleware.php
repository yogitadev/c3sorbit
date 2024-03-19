<?php

namespace App\Http\Middleware\front;

use Closure;
use Illuminate\Http\Request;
use Laravel\SerializableClosure\Serializers\Signed;

// Models
use App\Models\Setting;

class CommonDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $setting_list = Setting::pluck('setting_value', 'setting_name')->all();


        $data = [
            'settings' => $setting_list,
        ];

        \View::share($data);

        return $next($request);
    }
}
