<?php

namespace App\Http\Controllers\admin\iam\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\iam\Role;
use App\Models\iam\module\Module;

// Helper
use App\Helpers\Helper;

class PermissionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function __invoke($unique_id, Request $request)
    {
        if(!Helper::checkPermission('modules.set_permissions')){
            return redirect()->route('dashboard');
        }

        $module_item = Module::where('unique_id', $unique_id)->first();
        if (is_null($module_item)) {
            return abort(404);
        }

        $role_list = Role::where('status','Active')->pluck('name','id');

        $module_permissions = $module_item->module_permissions;

        if (!is_null($module_permissions) && $module_permissions->count() > 0) {
            foreach ($module_permissions as $permission_item) {

                if ($permission_item->permission_to_all == 'Yes') {
                    $permission_item->selected_roles = ['all'];
                } else {
                    $permission_item->selected_roles = $permission_item->permission_roles()->pluck('role_id')->toArray();
                }
            }
        }
        //dd($module_permissions);

        $role_list = ['all'=>'All'] + $role_list->toArray();

        return view('admin.iam.modules.permission', [
            'module_item' => $module_item,
            'role_list' => $role_list,
            'module_permissions'=>$module_permissions,
        ]);
    }
}
