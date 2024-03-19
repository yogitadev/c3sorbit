<?php

namespace App\Http\Controllers\admin\cms\lecture_schedules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Event
use App\Events\admin\cms\lecture_schedules\DeleteEvent;

// Models
use App\Models\cms\LectureSchedule;

// Helpers
use App\Helpers\Helper;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($unique_id, Request $request)
    {
        $user_item = Auth::user();

        $item = LectureSchedule::where('unique_id', $unique_id)->firstOrFail();
        
        $lecture_schedule_item_temp = $item;
        $item->delete();

        // Call Event
        DeleteEvent::dispatch([
            'user_item' => $user_item,
            'lecture_schedule_item' => $lecture_schedule_item_temp,
        ]);
        flash('Lecture Schedule deleted Successfully.')->success();
        
    }
}
