<?php

namespace App\Http\Controllers\admin\iam\personnel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\iam\Role;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $params = $request->all();
        
        if(!Helper::checkPermission('personnels.add')){
            return redirect()->route('admin-dashboard');
        }

        $role_list = Role::pluck('name','id');
        return view('admin.iam.personnel.create', [
            'role_list'=>$role_list,
        ]);
    }
}
