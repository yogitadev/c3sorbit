<?php

namespace App\Http\Controllers\admin\iam\roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\iam\Role;

// Helper
use App\Helpers\Helper;

class IndexController extends Controller
{
    private $validRequestFieldArr = [
        'search',
        'status',
        'division_id',
        'per_page',
        'page',
        'order_col',
        'order_by'
    ];

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        if (!Helper::checkHasAnyPermission('roles')) {
            return redirect()->route('admin-dashboard');
        }

        $params = $request->all();

        $list = Role::getDataList($params);

        if ($request->has('page') && $request->get('page') > 1 && $list->count() <= 0) {
            $params['page'] = $params['page'] - 1;
            $callback = fn (string $k, string $v): string => "$k=$v";
            return redirect(route('role-list') . '?' . implode('&', array_map($callback, array_keys($params), array_values($params))));
        }

        return view('admin.iam.roles.index', [
            'list' => $list,
            'params' => $params,
        ]);
    }
}
