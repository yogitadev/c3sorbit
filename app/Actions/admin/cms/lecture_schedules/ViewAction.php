<?php

namespace App\Actions\admin\cms\lecture_schedules;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Models
use App\Models\cms\LectureSchedule;
use App\Models\cms\LectureStudentPresent;

// Helper
use App\Helpers\Helper;

class ViewAction
{
    use AsAction;

    public function handle(LectureSchedule $item, Request $request)
    {
        $params = $request->all();
        $request['lecture_id'] = $item['id'];
        $request['programcode_id'] = $item['programcode_id'];
        $request['subject_id'] = $item['subject_id'];
        $request['lecture_date'] = $item['lecture_date'];

        if(isset($params['selected_fail_ids'])) {
            if(count($params['selected_fail_ids']) > 0) {
                foreach ($params['selected_fail_ids'] as $key => $value) {
                    $request['status'] = 'Absent';
                    $request['student_id'] = $value;
                    $data = LectureStudentPresent::where('student_id',$value)->first();
                    if($data == null) {
                        LectureStudentPresent::create($request->all());
                    } else {
                        $data->update($request->all());
                    }
                }
            }
        }
        if(isset($params['selected_pass_ids'])) {
            if(count($params['selected_pass_ids']) > 0) {
                foreach ($params['selected_pass_ids'] as $key => $value) {
                    $request['status'] = 'Present';
                    $request['student_id'] = $value;
                    $data = LectureStudentPresent::where('student_id',$value)->first();
                    if($data == null) {
                        LectureStudentPresent::create($request->all());
                    } else {
                        $data->update($request->all());
                    }
                }
            }
        }
       
        $item->fill($request->all());
        return $item;
    }
}
