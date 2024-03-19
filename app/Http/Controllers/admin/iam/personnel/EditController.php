<?php

namespace App\Http\Controllers\admin\iam\personnel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\iam\personnel\User;
use App\Models\iam\Role;

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
        if(!Helper::checkPermission('personnels.edit')){
            return redirect()->route('admin-dashboard');
        }
        
        $item = User::where('unique_id', $unique_id)->first();

        $role_list = Role::pluck('name','id');

        return view('admin.iam.personnel.edit', [
            'item' => $item,
            'role_list'=>$role_list,
        ]);
    }
}
