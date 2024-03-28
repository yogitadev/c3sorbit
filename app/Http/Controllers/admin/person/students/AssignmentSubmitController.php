<?php

namespace App\Http\Controllers\admin\person\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Helpers
use App\Helpers\Helper;

//Model
use App\Models\person\Student;

// Request
use App\Http\Requests\admin\person\students\AssignmentStoreRequest;

// Action
use App\Actions\admin\person\students\AssignmentStoreAction;

// Event
use App\Events\admin\person\students\AssignmentCreateEvent;

class AssignmentSubmitController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(AssignmentStoreRequest $request)
    {
        $params = $request->all();
        
        if(!Helper::checkPermission('students.assignment_submit')){
            return redirect()->route('admin-dashboard');
        }
        $student = Student::where('id',$params['student_id'])->first();
        $user_item = Auth::user();

        $student_item = AssignmentStoreAction::make()->handle($request);
        
        $changes = Helper::getModelChanges($student_item);

        // Call Event
        AssignmentCreateEvent::dispatch([
            'user_item' => $user_item,
            'student_item' => $student_item,
            'changes' => $changes,
        ]);

        flash('Assignment Submitted Successfully.')->success();
        return redirect(route('view-student',['unique_id' => $student['unique_id']]));
    }
}
