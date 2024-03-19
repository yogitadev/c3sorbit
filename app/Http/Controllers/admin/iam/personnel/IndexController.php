<?php

namespace App\Http\Controllers\admin\iam\personnel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\iam\personnel\User;
use App\Models\iam\Role;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $params = $request->all();

        $list = User::getAdminList($params);

        $role_list = Role::pluck('name','id');

        if ($request->has('page') && $request->get('page') > 1 && $list->count() <= 0) {
            $params['page'] = $params['page'] - 1;
            $callback = fn (string $k, string $v): string => "$k=$v";
            return redirect(route('personnel-list') . '?' . Helper::generateQueryString($params));
        }

        return view('admin.iam.personnel.index', [
            'list' => $list,
            'params' => $params,
            'role_list' => $role_list,
        ]);
    }
}
