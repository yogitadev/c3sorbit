<?php

namespace App\Http\Controllers\admin\iam\roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\iam\roles\UpdateRequest;

// Action
use App\Actions\admin\iam\roles\UpdateAction;

// Models
use App\Models\iam\Role;

// Event
use App\Events\admin\iam\roles\UpdateEvent;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($unique_id, UpdateRequest $request)
    {
        if(!Helper::checkPermission('roles.edit')){
            return redirect()->route('admin-dashboard');
        }

        $user_item = Auth::user();

        $item = Role::where('unique_id', $unique_id)->firstOrFail();
        $item_temp = $item->replicate();
        $role_item = UpdateAction::make()->handle($item, $request);
        $changes = Helper::getModelChanges($role_item);

        // Check for Division change [Start]
        if ($item_temp->division_id != $item->division_id) {
            $changes[] = [
                'field_name' => 'division_id',
                'field_title' => 'Division',
                'old_value' => !is_null($item_temp->division) ? $item_temp->division->title : null,
                'new_value' => !is_null($item->division) ? $item->division->title : null,
            ];
        }
        // Check for Division change [End]

       $item->save();

        // Call Event
        UpdateEvent::dispatch([
            'user_item' => $user_item,
            'role_item' => $item,
            'changes' => $changes,
            'action' => '-',
        ]);

        flash('Role updated successfully.')->success();
        return redirect(route('role-list'));
    }
}
