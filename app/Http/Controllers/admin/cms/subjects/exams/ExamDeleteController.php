<?php

namespace App\Http\Controllers\admin\cms\subjects\exams;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Event
use App\Events\admin\cms\subjects\ExamDeleteEvent;

// Models
use App\Models\cms\Exam;

// Helpers
use App\Helpers\Helper;

class ExamDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($subject_id, $unique_id, Request $request)
    {
        if(!Helper::checkPermission('subjects.exam_delete')){
            return redirect()->route('admin-dashboard');
        }

        $user_item = Auth::user();

        $item = Exam::where('unique_id', $unique_id)->firstOrFail();
        
        $exam_item_temp = $item;
        
        //Exam Questions Deleted
        $item->exam_questions()->delete();

        $exam_item_temp = $item;
        $item->delete();

        // Call Event
        ExamDeleteEvent::dispatch([
            'user_item' => $user_item,
            'exam_item' => $exam_item_temp,
        ]);
        flash('Exam Paper Deleted Successfully.')->success();
        
    }
}
