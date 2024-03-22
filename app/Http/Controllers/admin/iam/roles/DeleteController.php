<?php

namespace App\Http\Controllers\admin\iam\roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\iam\Role;

// Event
use App\Events\admin\iam\roles\DeleteEvent;

// Helper
use App\Helpers\Helper;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($unique_id, Request $request)
    {

        if(!Helper::checkPermission('roles.delete')){
            return redirect()->route('dashboard');
        }

        $user_item = Auth::user();
        $item = Role::where('unique_id', $unique_id)->firstOrFail();
        
        $role_item_temp = $item->replicate();
        $item->delete();

        //Call Event
        DeleteEvent::dispatch([
            'user_item' => $user_item,
            'role_item' => $role_item_temp,
        ]);

        flash('Role deleted successfully.')->success();
    }
}
