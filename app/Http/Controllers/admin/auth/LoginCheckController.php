<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

// Requests
use App\Http\Requests\admin\auth\LoginRequest;

// Helper
use App\Helpers\Helper;

// Action
use App\Actions\admin\auth\UserLogin;

// Event
use App\Events\admin\auth\login\LoginSuccessEvent;

class LoginCheckController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request)
    {
        //

        if (Auth::check()) {
            return redirect()->intended(route('admin-dashboard'));
        }

        $field = filter_var($request->get('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$field => $request->get('username'), 'password' => $request->get('password')])) {
            Auth::logoutOtherDevices($request->get('password'));

            $user_item = Auth::user();

            // User Login Action Call
            UserLogin::make()->handle($user_item, $request);

            // Event
            LoginSuccessEvent::dispatch(['user_item' => $user_item]);

            return redirect()->intended(route('admin-dashboard'));
        }

        return redirect(route('admin-login'))
            ->withInput($request->only('username'))
            ->withErrors([
                'username' => 'Username and password do not match',
            ]);
    }
}
