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
        ]);
    }
}
