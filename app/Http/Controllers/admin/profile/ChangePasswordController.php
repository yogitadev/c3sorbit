<?php

namespace App\Http\Controllers\admin\profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Requests
use App\Http\Requests\admin\profile\ChangePasswordRequest;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\iam\personnel\User;

class ChangePasswordController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ChangePasswordRequest $request)
    {
        //
        $requestArr = $request->all();
        $profile_item = User::findOrFail(Auth::id());
        if (Hash::check($requestArr['password'], $profile_item->password)) {
            flash('Your old password and new password are same.')->error();
            return back();
        } else {
            $profile_item->password = bcrypt($requestArr['password']);
            $profile_item->save();
            flash('Your password updated successfully.')->success();
            return redirect(route('admin-profile'));
        }

    }
}
