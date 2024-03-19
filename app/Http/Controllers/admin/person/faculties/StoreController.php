<?php

namespace App\Http\Controllers\admin\person\faculties;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\person\faculties\StoreRequest;

// Action
use App\Actions\admin\person\faculties\StoreAction;

// Event
use App\Events\admin\person\faculties\CreateEvent;

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

        $faculty_item = StoreAction::make()->handle($request);
        
        $changes = Helper::getModelChanges($faculty_item);

        // Call Event
        CreateEvent::dispatch([
            'user_item' => $user_item,
            'faculty_item' => $faculty_item,
            'changes' => $changes,
        ]);

        flash('Faculty Created Successfully.')->success();
        return redirect(route('faculty-list'));
    }
}
