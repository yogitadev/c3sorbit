<?php

namespace App\Http\Controllers\admin\cms\lecture_schedules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\cms\lecture_schedules\StoreRequest;

// Action
use App\Actions\admin\cms\lecture_schedules\StoreAction;

// Event
use App\Events\admin\cms\lecture_schedules\CreateEvent;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreRequest $request)
    {
        
        $user_item = Auth::user();

        $lecture_schedule_item = StoreAction::make()->handle($request);
        
        $changes = Helper::getModelChanges($lecture_schedule_item);

        // Call Event
        CreateEvent::dispatch([
            'user_item' => $user_item,
            'lecture_schedule_item' => $lecture_schedule_item,
            'changes' => $changes,
        ]);

        flash('Lecture Schedule Created Successfully.')->success();
        return redirect(route('lecture-schedule-list'));
    }
}
