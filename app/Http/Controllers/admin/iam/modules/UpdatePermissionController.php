<?php

namespace App\Http\Controllers\admin\iam\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\iam\module\Permission as PermissionModal;
use App\Models\iam\Role as RoleModal;
use App\Models\iam\module\Module;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

// Event
use App\Events\admin\iam\modules\UpdatePermissionEvent;

// Helper
use App\Helpers\Helper;

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
        if(!Helper::checkPermission('modules.set_permissions')){
            return redirect()->route('dashboard');
        }

        $user_item = Auth::user();

        $module_item = Module::where('unique_id', $unique_id)->first();
        if (is_null($module_item)) {
            return abort(404);
        }
        $changesArr = [];
        $all_roles_arr = Role::where('status','Active')->pluck('id')->toArray();
        $permission_list = $request->get('permission_list');
        
        $update_permission_arr = [];
        if (is_array($permission_list) && count($permission_list) > 0) {
            foreach ($permission_list as $permission_id => $selected_role_list) {
                $permission_item = Permission::find($permission_id);
                $new_value = [];
                $new_role_ids = [];
                $old_value = [];
                $old_role_ids = [];
                $role_name = [];
                if (!is_null($permission_item)) {
                    $permission_module_item = PermissionModal::find($permission_item->id);
                    if ($permission_module_item->permission_to_all == 'Yes') {
                        $old_value = ['All'];
                    } else {
                        $old_role_ids = $permission_module_item->permission_roles()->pluck('role_id')->toArray();
                        if (count($old_role_ids) > 0) {
                            $old_value = Role::whereIn('id', $old_role_ids)->pluck('name')->toArray();
                        }
                    }

                    if (isset($selected_role_list) && count($selected_role_list) > 0) {
                        if (in_array('all', $selected_role_list)) {
                            $permission_item->syncRoles($all_roles_arr);
                            $permission_item->permission_to_all = 'Yes';
                            $permission_item->save();
                        } else {
                            $role_name = Role::whereIn('id',$selected_role_list)->pluck('name')->toArray();
                            $permission_item->syncRoles($role_name);
                            $permission_item->permission_to_all = 'No';
                            $permission_item->save();
                        }
                    } else {
                        // Revoke permission from all roles
                        $permission_item->permission_to_all = 'No';
                        $permission_item->save();
                        $permission_item->syncRoles([]);
                    }

                    $permission_module_item = PermissionModal::find($permission_item->id);
                    if ($permission_module_item->permission_to_all == 'Yes') {
                        $new_value = ['All'];
                    } else {
                        $new_role_ids = $permission_module_item->permission_roles()->pluck('role_id')->toArray();
                        if (count($new_role_ids) > 0) {
                            $new_value = Role::whereIn('id', $new_role_ids)->pluck('name')->toArray();
                        }
                    }

                    if (count(array_diff($new_value, $old_value)) > 0 || count($old_value) != count($new_value)) {
                        $changesArr[] = [
                            'field_name' => 'permission',
                            'field_title' => $permission_item->title,
                            'old_value' => count($old_value) > 0 ? implode(', ', $old_value) : null,
                            'new_value' => count($new_value) > 0 ? implode(', ', $new_value) : null,
                        ];
                    }

                    $update_permission_arr[] = $permission_module_item->id;
                }
            }
        } else{
            $remove_permission_list = Permission::where('module_id',$module_item->id)->get();
            if(!is_null($remove_permission_list) && $remove_permission_list->count() > 0){
                foreach($remove_permission_list as $remove_permission_item){
                    $remove_permission_item->syncRoles([]);
                }
            }
        }

        if (count($update_permission_arr) > 0) {
            $remove_permission_list = Permission::where('module_id',$module_item->id)->whereNotIn('id',$update_permission_arr)->get();
            if(!is_null($remove_permission_list) && $remove_permission_list->count() > 0){
                foreach($remove_permission_list as $remove_permission_item){
                    $remove_permission_item->syncRoles([]);
                }
            }
        }

        $module_item->need_set_permissions = 'No';
        $module_item->save();

        // Call Event
        if (count($changesArr) > 0) {
            UpdatePermissionEvent::dispatch([
                'user_item' => $user_item,
                'module_item' => $module_item,
                'changes' => $changesArr,
            ]);
        }

        flash('Role permissions has been updated.')->success();
        return back();
    }
}
