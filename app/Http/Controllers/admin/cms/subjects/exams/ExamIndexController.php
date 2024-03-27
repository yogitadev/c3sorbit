<?php

namespace App\Http\Controllers\admin\cms\subjects\exams;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\cms\Exam;
use App\Models\cms\Subject;

class ExamIndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($unique_id, Request $request)
    {
        $params = $request->all();

        $subject = Subject::where('unique_id',$unique_id)->first();
        $params['subject_id'] = $subject->id;
        $list = Exam::getAdminList($params);

        $subject_list = Subject::pluck('name','id');

        if ($request->has('page') && $request->get('page') > 1 && $list->count() <= 0) {
            $params['page'] = $params['page'] - 1;
            $callback = fn (string $k, string $v): string => "$k=$v";
            return redirect(route('country-list') . '?' . Helper::generateQueryString($params));
        }

        return view('admin.cms.subjects.exams.index', [
            'list' => $list,
            'params' => $params,
            'unique_id' => $unique_id,
            'subject_id' => $subject->id,
            'subject_list' => $subject_list,
        ]);
    }
}
