<?php

namespace App\Http\Controllers\admin\iam\roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\iam\Role;

// Helper
use App\Helpers\Helper;

class ReorderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if(!Helper::checkPermission('roles.edit')){
            return redirect()->route('admin-dashboard');
        }

        $list = Role::orderBy('sort_order', 'ASC')->get();
        return view('admin.iam.roles.reorder', [
            'list' => $list
        ]);
    }
}
