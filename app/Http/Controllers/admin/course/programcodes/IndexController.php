<?php

namespace App\Http\Controllers\admin\course\programcodes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\course\Programcode;
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

        $list = Programcode::getAdminList($params);

        $institution_list = Institution::pluck('name','id');

        $campus_list = Campus::pluck('name','id');

        if ($request->has('page') && $request->get('page') > 1 && $list->count() <= 0) {
            $params['page'] = $params['page'] - 1;
            $callback = fn (string $k, string $v): string => "$k=$v";
            return redirect(route('programcode-list') . '?' . Helper::generateQueryString($params));
        }
        if($request->has('institute') && $request->get('institute')) {
            $all_campus_list = Campus::where('institution_id',$params['institution_id'])->pluck('name','id');
            return $all_campus_list;
        }
        return view('admin.course.programcodes.index', [
            'list' => $list,
            'params' => $params,
            'institution_list' => $institution_list,
            'campus_list' => $campus_list,
        ]);
    }
}
