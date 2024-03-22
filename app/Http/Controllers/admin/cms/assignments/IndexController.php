<?php

namespace App\Http\Controllers\admin\cms\assignments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\cms\Subject;
use App\Models\cms\Assignment;
use App\Models\person\Faculty;

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

        $list = Assignment::getAdminList($params);

        $subject_list = Subject::pluck('name','id');
        $faculty_list = Faculty::select(DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"),"id")->where('status','Active')->pluck("full_name","id");

        if ($request->has('page') && $request->get('page') > 1 && $list->count() <= 0) {
            $params['page'] = $params['page'] - 1;
            $callback = fn (string $k, string $v): string => "$k=$v";
            return redirect(route('country-list') . '?' . Helper::generateQueryString($params));
        }

        if($request->has('faculty') && $request->get('faculty')) {
            $all_subject_list = Subject::where('faculty_id',$params['faculty_id'])->pluck('name','id');
            return $all_subject_list;
        }

        return view('admin.cms.assignments.index', [
            'list' => $list,
            'params' => $params,
            'subject_list' => $subject_list,
            'faculty_list' => $faculty_list,
        ]);
    }
}
