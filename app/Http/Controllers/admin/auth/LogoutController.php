<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

// Event
use App\Events\admin\auth\login\LogoutEvent;

class LogoutController extends Controller
{
   
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user_item = Auth::user();

        LogoutEvent::dispatch([
            'user_item' => $user_item,
        ]);

        Auth::logout();
        Session::flush();

        return redirect(route('admin-login'));
    }
}
