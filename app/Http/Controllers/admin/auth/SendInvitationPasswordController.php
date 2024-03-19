<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Mail\admin\UserForgotPasswordEmail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

// Requests
use App\Http\Requests\admin\auth\ForgetPasswordRequest;

// Helper
use App\Helpers\Helper;

// Action
use App\Actions\admin\auth\UserForgetPassword;

// Event
use App\Events\admin\auth\login\ForgetPasswordEvent;

class SendInvitationPasswordController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ForgetPasswordRequest $request)
    {
        $users_item = UserForgetPassword::make()->handle($request);

        $changes = Helper::getModelChanges($users_item);

        $password_setup_link = \URL::temporarySignedRoute(
            'admin-reset-password',
            Carbon::now()->addHours(24),
            ['token'=>$users_item->remember_token]
        );

        if (config('env.send_email') == true) {
            Mail::to($request['email'])->send(new UserForgotPasswordEmail($password_setup_link));
        }
        
        // Event
        ForgetPasswordEvent::dispatch([
            'users_item' => $users_item,
            'changes' => $changes,
        ]);

        flash('Email updated request send successfully please check your inbox..')->success();
        return back();
    }
}
