<?php

namespace App\Http\Controllers\admin\cms\subjects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\cms\Subject;
use App\Models\course\Programcode;
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

        $item = Subject::where('unique_id', $unique_id)->first();

        $program_list = Programcode::pluck('program_name','id');
        $faculty_list = Faculty::select(DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"),"id")->where('status','Active')->pluck("full_name","id");

        return view('admin.cms.subjects.edit', [
            'item' => $item,
            'program_list' => $program_list,
            'faculty_list' => $faculty_list,
        ]);
    }
}
