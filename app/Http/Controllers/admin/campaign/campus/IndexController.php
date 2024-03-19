<?php

namespace App\Http\Controllers\admin\campaign\campus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\campaign\Campus;
use App\Models\campaign\Institution;

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

        $list = Campus::getAdminList($params);

        $institution_list = Institution::pluck('name','id');

        if ($request->has('page') && $request->get('page') > 1 && $list->count() <= 0) {
            $params['page'] = $params['page'] - 1;
            $callback = fn (string $k, string $v): string => "$k=$v";
            return redirect(route('campus-list') . '?' . Helper::generateQueryString($params));
        }

        return view('admin.campaign.campus.index', [
            'list' => $list,
            'params' => $params,
            'institution_list' => $institution_list,
        ]);
    }
}
