<?php

namespace App\Http\Controllers\admin\cms\subjects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\cms\subjects\StoreRequest;

// Action
use App\Actions\admin\cms\subjects\StoreAction;

// Event
use App\Events\admin\cms\subjects\CreateEvent;

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
        if(!Helper::checkPermission('subjects.add')){
            return redirect()->route('admin-dashboard');
        }

        $user_item = Auth::user();

        $subject_item = StoreAction::make()->handle($request);
        
        $changes = Helper::getModelChanges($subject_item);

        // Call Event
        CreateEvent::dispatch([
            'user_item' => $user_item,
            'subject_item' => $subject_item,
            'changes' => $changes,
        ]);

        flash('Subject Created Successfully.')->success();
        return redirect(route('subject-list'));
    }
}
