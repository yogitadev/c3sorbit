<?php

namespace App\Http\Controllers\admin\cms\subjects\exams;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\cms\Subject;
use App\Models\cms\Exam;
use App\Models\person\Faculty;

class ExamEditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($subject_id, $unique_id, Request $request)
    {
        if(!Helper::checkPermission('subjects.exam_edit')){
            return redirect()->route('admin-dashboard');
        }
        $item = Exam::where('unique_id', $unique_id)->first();

        $question_list = $item->exam_questions->toArray(); 
        $subject = Subject::where('id', $subject_id)->first();
      
        return view('admin.cms.subjects.exams.edit', [
            'item' => $item,
            'unique_id' => $subject['unique_id'],
            'subject_id' => $subject_id,
            'question_list' => $question_list,
        ]);
    }
}
