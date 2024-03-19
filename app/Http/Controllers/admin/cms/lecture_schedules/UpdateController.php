<?php

namespace App\Http\Controllers\admin\cms\lecture_schedules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\cms\lecture_schedules\UpdateRequest;

// Models
use App\Models\cms\LectureSchedule;

// Action
use App\Actions\admin\cms\lecture_schedules\UpdateAction;

// Event
use App\Events\admin\cms\lecture_schedules\UpdateEvent;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($unique_id, UpdateRequest $request)
    {
        
        $user_item = Auth::user();

        $item = LectureSchedule::where('unique_id', $unique_id)->firstOrFail();
        $lecture_schedule_item = UpdateAction::make()->handle($item, $request);
        $changes = Helper::getModelChanges($lecture_schedule_item);
        $item->save();

         // Call Event
         UpdateEvent::dispatch([
            'user_item' => $user_item,
            'lecture_schedule_item' => $lecture_schedule_item,
            'changes' => $changes,
            'action' => '-'
        ]);

        flash('Lecture Schedule Updated Successfully.')->success();
        return redirect(route('lecture-schedule-list'));
    }
}
