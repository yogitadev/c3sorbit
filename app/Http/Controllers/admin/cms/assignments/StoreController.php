<?php

namespace App\Http\Controllers\admin\cms\assignments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\cms\assignments\StoreRequest;

// Action
use App\Actions\admin\cms\assignments\StoreAction;

// Event
use App\Events\admin\cms\assignments\CreateEvent;

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

        $assignment_item = StoreAction::make()->handle($request);
        
        $changes = Helper::getModelChanges($assignment_item);

        // Call Event
        CreateEvent::dispatch([
            'user_item' => $user_item,
            'assignment_item' => $assignment_item,
            'changes' => $changes,
        ]);

        flash('Assignment Created Successfully.')->success();
        return redirect(route('assignment-list'));
    }
}
