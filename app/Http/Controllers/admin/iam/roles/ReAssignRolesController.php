<?php

namespace App\Http\Controllers\admin\iam\roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Models
use Spatie\Permission\Models\Role;
use App\Models\iam\personnel\User;

class ReAssignRolesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function __invoke(Request $request)
    {

        if (!in_array(Auth::user()->email, ['milan@niupay.com.pg', 'ajay@niupay.com.pg'])) {
            return redirect()->route('dashboard');
        }

        $personnel_list = User::get();
        if (!is_null($personnel_list) && $personnel_list->count() > 0) {
            foreach ($personnel_list as $personnel_item) {
                if (!is_null($personnel_item->role_id) && $personnel_item->role_id > 0) {
                    $role_item = Role::find($personnel_item->role_id);
                    //$personnel_item->assignRole($role_item);
                    $personnel_item->syncRoles($role_item);
                }
            }
        }

        flash('Role re-assigned successfully.')->success();
        return back();
    }
}
