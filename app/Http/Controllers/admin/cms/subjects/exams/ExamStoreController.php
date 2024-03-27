<?php

namespace App\Http\Controllers\admin\cms\subjects\exams;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

//Models
use App\Models\cms\Subject;

// Request
use App\Http\Requests\admin\cms\subjects\exams\StoreRequest;

// Action
use App\Actions\admin\cms\subjects\exams\StoreAction;

// Event
use App\Events\admin\cms\subjects\ExamCreateEvent;

class ExamStoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($subject_id,StoreRequest $request)
    {
        if(!Helper::checkPermission('subjects.exam_add')){
            return redirect()->route('admin-dashboard');
        }

        $subject = Subject::where('id', $subject_id)->first();

        $user_item = Auth::user();

        $exam_item = StoreAction::make()->handle($subject_id, $request);
        
        $changes = Helper::getModelChanges($exam_item);

        // Call Event
        ExamCreateEvent::dispatch([
            'user_item' => $user_item,
            'exam_item' => $exam_item,
            'changes' => $changes,
        ]);

        flash('Exam Paper Created Successfully.')->success();
        return redirect(route('exam-list', ['unique_id' => $subject['unique_id']]));
    }
}
