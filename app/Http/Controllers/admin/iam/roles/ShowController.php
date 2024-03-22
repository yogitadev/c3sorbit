<?php

namespace App\Http\Controllers\admin\iam\roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\iam\personnel\User;
use App\Models\iam\Role;

// Helper
use App\Helpers\Helper;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function __invoke($unique_id, Request $request)
    {
        if(!Helper::checkPermission('roles.view')){
            return redirect()->route('admin-dashboard');
        }

        $role_item = Role::where('unique_id', $unique_id)->first();
        if (is_null($role_item)) {
            return abort(404);
        }
        $params = $request->all();
        $params['role_id'] = $role_item->id;
        $list = User::getDataList($params);

        if ($request->has('page') && $request->get('page') > 1 && $list->count() <= 0) {
            $params['page'] = $params['page'] - 1;
            $callback = fn (string $k, string $v): string => "$k=$v";
            return redirect(route('view-role', ['unique_id' => $role_item->unique_id]) . '?' . implode('&', array_map($callback, array_keys($params), array_values($params))));
        }

        return view('admin.iam.roles.show.index', [
            'role_item' => $role_item,
            'list' => $list,
            'params' => $params,
        ]);
    }
}
