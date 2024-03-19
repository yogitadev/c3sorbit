<?php

namespace App\Http\Controllers\admin\iam\roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\iam\module\ModuleCategory;
use App\Models\iam\Role;

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
        if (!Helper::checkPermission('roles.update_permission')) {
            return redirect()->route('admin-dashboard');
        }

        $role_item = Role::where('unique_id', $unique_id)->first();
        if (is_null($role_item)) {
            return abort(404);
        }

        $current_permissions = \DB::table('role_has_permissions')->where('role_id', $role_item->id)->pluck('permission_id');

        return view('admin.iam.roles.show.permission', [
            'role_item' => $role_item,
            'module_categories' => ModuleCategory::with(['modules.permissions'])->order()->get(),
            'current_permissions' => !is_null($current_permissions) ? $current_permissions->toArray() : []
        ]);
    }
}
