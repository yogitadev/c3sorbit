<?php

namespace App\Http\Controllers\admin\auth;

use Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        if (Auth::check()) {
            return redirect(route('admin-dashboard'));
        }

        return view('admin.auth.login.index', []);
    }
}
