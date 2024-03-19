<?php

namespace App\Http\Controllers\admin\cms\subjects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\course\Programcode;
use App\Models\person\Faculty;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $program_list = Programcode::pluck('program_name','id');
        $faculty_list = Faculty::select(DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"),"id")->where('status','Active')->pluck("full_name","id");

        return view('admin.cms.subjects.create', [
            'program_list' => $program_list,
            'faculty_list' => $faculty_list,
        ]);
    }
}
