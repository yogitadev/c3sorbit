<?php

namespace App\Http\Controllers\admin\cms\subjects\exams;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\cms\Subject;

class ExamCreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($subject_id, Request $request)
    {
        if(!Helper::checkPermission('subjects.exam_add')){
            return redirect()->route('admin-dashboard');
        }

        $subject = Subject::where('id',$subject_id)->first();

        return view('admin.cms.subjects.exams.create', [
            'unique_id' => $subject['unique_id'],
        ]);
    }
}
