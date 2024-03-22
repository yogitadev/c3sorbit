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

class ReorderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $faculty_list = Faculty::order()->select(DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"),"id")->where('status','Active')->pluck("full_name","id");
        $data = [
            'faculty_list' => $faculty_list,
            'subject_list' => []
        ];

        if (($request->has('faculty_id') && $request->get('faculty_id') > 0)) {
            $data['subject_list'] = Subject::where('faculty_id',$request->get('faculty_id'))->order()->get();
            $data['selected_faculty_id'] = $request->get('faculty_id');            
        }
        if (($request->has('subject_id') && $request->get('subject_id') > 0)) {
            $subject_list = Subject::where('faculty_id',$request->get('faculty_id'))->order()->pluck('name','id');
            $data['subject_list'] = $subject_list;
            $data['assignment_list'] = Assignment::where('subject_id',$request->get('subject_id'))->where('subject_id',$request->get('subject_id'))->order()->get();
            $data['selected_subject_id'] = $request->get('subject_id');            
        }
        $list = Assignment::orderBy('sort_order', 'ASC')->get();
        return view('admin.cms.assignments.reorder', [
            'data' => $data
        ]);
    }
}
