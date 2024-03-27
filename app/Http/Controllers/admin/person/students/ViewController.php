<?php

namespace App\Http\Controllers\admin\person\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\person\Student;

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
        //->where('lecture_time','>=',date('H:i:s'))
       // $lecture_list = (object)$lecture_list;
        
        if(count($lecture_list)) {
            foreach ($lecture_list as $key => $value) {
                if($value['lecture_date'] == date('Y-m-d')) {
                    if($value['lecture_time'] < date('H;i:s')) {
                        unset($lecture_list[$key]);
                    }
                }
            }
        }
    //dd(($lecture_list));
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
        ]);
    }
}
