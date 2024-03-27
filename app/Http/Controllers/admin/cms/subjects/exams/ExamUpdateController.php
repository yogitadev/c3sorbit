<?php

namespace App\Http\Controllers\admin\cms\subjects\exams;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\cms\subjects\exams\UpdateRequest;

// Models
use App\Models\cms\Exam;
use App\Models\cms\Subject;

// Action
use App\Actions\admin\cms\subjects\exams\UpdateAction;

// Event
use App\Events\admin\cms\subjects\ExamUpdateEvent;

class ExamUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($subject_id, $unique_id, UpdateRequest $request)
    {
        if(!Helper::checkPermission('subjects.exam_edit')){
            return redirect()->route('admin-dashboard');
        }

        $subject = Subject::where('id', $subject_id)->first();

        $user_item = Auth::user();

        $item = Exam::where('unique_id', $unique_id)->firstOrFail();
        $exam_item = UpdateAction::make()->handle($subject_id, $item, $request);
        $changes = Helper::getModelChanges($exam_item);
        $item->save();

         // Call Event
         ExamUpdateEvent::dispatch([
            'user_item' => $user_item,
            'exam_item' => $exam_item,
            'changes' => $changes,
            'action' => '-'
        ]);

        flash('Exam Paper Updated Successfully.')->success();
        return redirect(route('exam-list', ['unique_id' => $subject['unique_id']]));
    }
}
