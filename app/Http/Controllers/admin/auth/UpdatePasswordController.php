<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helper
use App\Helpers\Helper;

// Requests
use App\Http\Requests\admin\auth\UpdatePasswordRequest;

// Model
use App\Models\iam\personnel\User;

// Action
use App\Actions\admin\auth\UserUpdatePassword;

// Event
use App\Events\admin\auth\login\UpdatePasswordEvent;

class UpdatePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($token, UpdatePasswordRequest $request)
    {
        $item = User::where('remember_token', $token)->first();

        $users_item = UserUpdatePassword::make()->handle($item, $request);

        $changes = Helper::getModelChanges($users_item);

        // Event
        UpdatePasswordEvent::dispatch([
            'users_item' => $users_item,
            'changes' => $changes,
        ]);

        flash('Password updated successfully.')->success();
        return redirect(route('admin-login'));
    }
}
