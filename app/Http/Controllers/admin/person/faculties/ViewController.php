<?php

namespace App\Http\Controllers\admin\person\faculties;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use App\Helpers\Helper;

// Models
use App\Models\person\Faculty;

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
        if(!Helper::checkPermission('faculties.view')){
            return redirect()->route('admin-dashboard');
        }

        $faculty_item = Faculty::where('unique_id', $unique_id)->first();

        $student_list = $faculty_item->student($faculty_item->id);
        
        return view('admin.person.faculties.view', [
            'faculty_item' => $faculty_item,
            'student_list' => $student_list,
        ]);
    }
}
