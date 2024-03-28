<?php

namespace App\Http\Controllers\admin\cms\assignments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

// Helpers
use App\Helpers\Helper;

// Models
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
        if(!Helper::checkPermission('assignments.view')){
            return redirect()->route('admin-dashboard');
        }
        $item = Assignment::where('unique_id', $unique_id)->first();
        $params['assignment_id'] = $item['id'];
        $params['subject_id'] = $item['subject_id'];
        $student_assignment_list = StudentAssignmentSubmit::getAdminList($params);

        return view('admin.cms.assignments.view', [
            'item' => $item,
            'student_assignment_list' => $student_assignment_list,
        ]);
    }
}
