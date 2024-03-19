<?php

namespace App\Http\Controllers\admin\auth;

use Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\iam\personnel\User;


class ResetPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($token, Request $request)
    {
        $user_item = User::where('remember_token',$token)->first();
        //dd(strtotime('now'), $request['expires'], (strtotime('now')- $request['expires']));
        if(strtotime("now") > $request['expires']) {
            abort(419);
        } else {
            return view('admin.auth.login.reset_password', []);
        }
    }
}
