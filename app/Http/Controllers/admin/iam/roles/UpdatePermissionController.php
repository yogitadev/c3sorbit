<?php

namespace App\Http\Controllers\admin\iam\roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

//Models
use App\Models\iam\Role;

// Event
use App\Events\admin\iam\roles\UpdatePermissionEvent;

class UpdatePermissionController extends Controller
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

        $user_item = Auth::user();

        $role_item = Role::where('unique_id', $unique_id)->first();
        if (is_null($role_item)) {
            return abort(404);
        }

        $role = \Spatie\Permission\Models\Role::findOrFail($role_item->id);

        $permission_id_arr = [];
        if ($request->has('permissions') && array($request->get('permissions')) && count($request->get('permissions')) > 0) {
            $permission_list = \Spatie\Permission\Models\Permission::whereIn('id',$request->get('permissions'))->get();
            $role->syncPermissions($permission_list);
        }else{
            $role->syncPermissions([]);
        }

        // Call Event
        UpdatePermissionEvent::dispatch([
            'user_item' => $user_item,
            'role_item' => $role_item,
        ]);

        flash('Permissions updated successfully!')->success();
        return back();
    }
}
