<?php

namespace App\Http\Controllers\admin\person\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\person\Student;
use App\Models\cms\Assignment;
use App\Models\person\StudentAssignmentSubmit;

class ViewController extends Controller
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

        if(!Helper::checkPermission('students.view')){
            return redirect()->route('admin-dashboard');
        }
        $item = Student::where('unique_id', $unique_id)->first();

        $lecture_list = [];
        $lecture_list = $item->programcode->lecture_schedule->where('lecture_date','>=' ,date('Y-m-d'));

        if(count($lecture_list) > 0) {
            foreach ($lecture_list as $key => $value) {
                if($value['lecture_date'] == date('Y-m-d')) {
                    if($value['lecture_time'] < date('H;i:s')) {
                        unset($lecture_list[$key]);
                    }
                }
            }
        }
        $assignment_list = [];
        $subjects = $item->programcode->subjects;
        if(count($subjects) > 0) {
            $count = 0;
            foreach ($subjects as $key => $value) {
                $assignment = Assignment::where('subject_id',$value['id'])->get();
                if($assignment != null) {
                    foreach ($assignment as $k => $val) {
                        $submitted = StudentAssignmentSubmit::where('student_id',$item['id'])->where('assignment_id',$val['id'])->where('subject_id',$value['id'])->first();
                        if($submitted != null) {
                            $status = 'submit';
                        } else {
                            $status = 'pending';
                        }

                        $assignment_list[$count]['subject_id'] = $value['id'];
                        $assignment_list[$count]['subject_name'] = $value['name'];
                        $assignment_list[$count]['assignment_id'] = $val['id'];
                        $assignment_list[$count]['assignment_title'] = $val['assignment_title'];
                        $assignment_list[$count]['status'] = $status;
                        $count++;
                    }
                }
                
            }
        }
        if($request->has('archive') && $request->has('vista_id') && $request->has('vl')) {
            
            $data = $item->studentVlArchieve($params['vista_id']);
            return $data;
        }
        if($request->has('archive') && $request->has('vista_id') && $request->has('col')) {
            
            $data = $item->studentColArchieve($params['vista_id']);
            return $data;
        }

        return view('admin.person.students.view', [
            'item' => $item,
            'lecture_list' => $lecture_list,
            'assignment_list' => $assignment_list,
        ]);
    }
}
