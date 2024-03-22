<?php

namespace App\Http\Controllers\admin\iam\roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\iam\Role;

// Event
use App\Events\admin\iam\roles\ReorderEvent;

// Helper
use App\Helpers\Helper;

class UpdateOrderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (!Helper::checkPermission('roles.edit')) {
            return redirect()->route('admin-dashboard');
        }

        $user_item = Auth::user();
        if ($request->has('items') && count($request->get('items')) > 0) {
            $item_list = [];
            $changesArr = [];
            $counter = 1;
            foreach ($request->get('items') as $id) {

                $item = Role::find($id);

                if (!is_null($item)) {
                    $item->sort_order = $counter;
                    $item->save();

                    $changesArr[]['field_title'] = $item->name;
                    $item_list[] = $item->id;
                    $counter++;
                }
            }

            if (count($item_list) > 0 && count($changesArr) > 0) {
                // Call Event
                ReorderEvent::dispatch([
                    'user_item' => $user_item,
                    'item_list' => $item_list,
                    'changes' => $changesArr
                ]);
            }

            flash('Roles are sorted successfully.')->success();
        }
    }
}
