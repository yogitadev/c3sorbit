<?php

namespace App\Http\Controllers\admin\cms\subjects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\cms\subjects\UpdateRequest;

// Models
use App\Models\cms\Subject;

// Action
use App\Actions\admin\cms\subjects\UpdateAction;

// Event
use App\Events\admin\cms\subjects\UpdateEvent;

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

        $item = Subject::where('unique_id', $unique_id)->firstOrFail();
        $subject_item = UpdateAction::make()->handle($item, $request);
        $changes = Helper::getModelChanges($subject_item);
        $item->save();

         // Call Event
         UpdateEvent::dispatch([
            'user_item' => $user_item,
            'subject_item' => $subject_item,
            'changes' => $changes,
            'action' => '-'
        ]);

        flash('Subject Updated Successfully.')->success();
        return redirect(route('subject-list'));
    }
}
