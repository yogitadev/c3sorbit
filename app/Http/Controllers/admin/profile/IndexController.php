<?php

namespace App\Http\Controllers\admin\profile;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\iam\personnel\User;

class IndexController extends Controller
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
        $profile_item = User::find(Auth::id());

        $data = [
            'profile_item' => $profile_item
        ];

        return view('admin.profile.index', $data);
    }
}
