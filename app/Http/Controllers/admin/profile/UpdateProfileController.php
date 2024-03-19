<?php

namespace App\Http\Controllers\admin\profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

// Requests
use App\Http\Requests\admin\profile\ProfileRequest;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\iam\personnel\User;

class UpdateProfileController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ProfileRequest $request)
    {
        //
        $profile_item = User::findOrFail(Auth::id());
        $profile_item->update($request->all());
        flash('Profile Updated Successfully.')->success();
        return redirect(route('admin-profile'));
    }
}
