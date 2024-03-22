<?php

namespace App\Http\Controllers\admin\cms\lecture_schedules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\cms\lecture_schedules\ViewRequest;

// Models
use App\Models\cms\LectureSchedule;

// Action
use App\Actions\admin\cms\lecture_schedules\ViewAction;

// Event
use App\Events\admin\cms\lecture_schedules\ViewEvent;

class ViewSaveController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($unique_id,ViewRequest $request)
    {
        if(!Helper::checkPermission('lecture_schedules.view')){
            return redirect()->route('admin-dashboard');
        }

        $user_item = Auth::user();

        $item = LectureSchedule::where('unique_id', $unique_id)->firstOrFail();
        $lecture_schedule_item = ViewAction::make()->handle($item, $request);
        
        $changes = Helper::getModelChanges($lecture_schedule_item);

        // Call Event
        ViewEvent::dispatch([
            'user_item' => $user_item,
            'lecture_schedule_item' => $lecture_schedule_item,
            'changes' => $changes,
            'action' => '-'
        ]);

        flash('Lecture Schedule Student View Successfully.')->success();
        return redirect()->back();
    }
}
