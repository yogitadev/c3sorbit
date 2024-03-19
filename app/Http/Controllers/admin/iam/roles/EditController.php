<?php

namespace App\Http\Controllers\admin\iam\roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\iam\Role;

// Helper
use App\Helpers\Helper;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __invoke($unique_id, Request $request)
    {

        if(!Helper::checkPermission('roles.edit')){
            return redirect()->route('admin-dashboard');
        }

        $item = Role::where('unique_id', $unique_id)->firstOrFail();
        if (is_null($item)) {
            return abort(404);
        }

        return view('admin.iam.roles.edit', [
            'item' => $item,
        ]);
    }
}
