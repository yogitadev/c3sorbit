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

        if(!Helper::checkPermission('assignments.edit')){
            return redirect()->route('admin-dashboard');
        }

        $item = Assignment::where('unique_id', $unique_id)->first();

        $subject_list = Subject::where('faculty_id',$item->faculty_id)->pluck('name','id');
        $faculty_list = Faculty::select(DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"),"id")->where('status','Active')->pluck("full_name","id");

        return view('admin.cms.assignments.edit', [
            'item' => $item,
            'subject_list' => $subject_list,
            'faculty_list' => $faculty_list,
        ]);
    }
}
