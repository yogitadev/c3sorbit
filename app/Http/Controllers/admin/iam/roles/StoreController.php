<?php

namespace App\Http\Controllers\admin\iam\roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\iam\roles\StoreRequest;

// Action
use App\Actions\admin\iam\roles\StoreAction;

// Models
use App\Models\iam\Role;

// Event
use App\Events\admin\iam\roles\CreateEvent;

class StoreController extends Controller
{
    private $validRequestFieldArr = [
        'name',
        'short_name',
        'status'
    ];

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreRequest $request)
    {
        if(!Helper::checkPermission('roles.add')){
            return redirect()->route('admin-dashboard');
        }

        $user_item = Auth::user();
        $role_item = StoreAction::make()->handle($request);

        $changes = Helper::getModelChanges($role_item);

        // Check for Division change [Start]
        $changes[] = [
            'field_name' => 'division_id',
            'field_title' => 'Division',
            'old_value' => null,
            'new_value' => !is_null($role_item->division) ? $role_item->division->title : null,
        ];
        // Check for Division change [End]

        // Call Event
        CreateEvent::dispatch([
            'user_item' => $user_item,
            'role_item' => $role_item,
            'changes' => $changes,
        ]);

        flash('Role created successfully.')->success();
        return redirect(route('role-list'));
    }
}
