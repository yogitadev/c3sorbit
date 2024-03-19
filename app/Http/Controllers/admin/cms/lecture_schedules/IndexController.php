<?php

namespace App\Http\Controllers\admin\cms\lecture_schedules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\cms\Subject;
use App\Models\cms\LectureSchedule;
use App\Models\course\Programcode;

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

        $list = LectureSchedule::getAdminList($params);

        $programcode_list = Programcode::pluck('program_name','id');
        $subject_list = Subject::pluck("name","id");

        if ($request->has('page') && $request->get('page') > 1 && $list->count() <= 0) {
            $params['page'] = $params['page'] - 1;
            $callback = fn (string $k, string $v): string => "$k=$v";
            return redirect(route('country-list') . '?' . Helper::generateQueryString($params));
        }

        return view('admin.cms.lecture_schedules.index', [
            'list' => $list,
            'params' => $params,
            'programcode_list' => $programcode_list,
            'subject_list' => $subject_list,
        ]);
    }
}
