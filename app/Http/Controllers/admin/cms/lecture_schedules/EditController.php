<?php

namespace App\Http\Controllers\admin\cms\lecture_schedules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\cms\Subject;
use App\Models\course\Programcode;
use App\Models\cms\LectureSchedule;

class EditController extends Controller
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
        
        $item = LectureSchedule::where('unique_id', $unique_id)->first();

        $program_list = Programcode::pluck('program_name','id');
        $subject_list = Subject::pluck("name","id");

        if(isset($params['date']) && isset($params['time'])) {
            $schedules = LectureSchedule::where('lecture_date',$params['date'])->where('lecture_time',$params['time'])->get();
           
            $schedule_array = [];
            if(count($schedules) > 0) {
                foreach($schedules as $schedule) {
                    $time = date('H:i',strtotime($schedule->lecture_time));
                   array_push($schedule_array,$time);
                }
            }  
            return $schedule_array;
        }

        return view('admin.cms.lecture_schedules.edit', [
            'item' => $item,
            'program_list' => $program_list,
            'subject_list' => $subject_list,
        ]);
    }
}
