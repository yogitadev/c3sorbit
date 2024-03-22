<?php

namespace App\Http\Controllers\admin\cms\assignments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\cms\assignments\UpdateRequest;

// Models
use App\Models\cms\Assignment;

// Action
use App\Actions\admin\cms\assignments\UpdateAction;

// Event
use App\Events\admin\cms\assignments\UpdateEvent;

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
        if(!Helper::checkPermission('assignment.edit')){
            return redirect()->route('admin-dashboard');
        }
        
        $user_item = Auth::user();

        $item = Assignment::where('unique_id', $unique_id)->firstOrFail();
        $assignment_item = UpdateAction::make()->handle($item, $request);
        $changes = Helper::getModelChanges($assignment_item);
        $item->save();

         // Call Event
         UpdateEvent::dispatch([
            'user_item' => $user_item,
            'assignment_item' => $assignment_item,
            'changes' => $changes,
            'action' => '-'
        ]);

        flash('Assignment Updated Successfully.')->success();
        return redirect(route('assignment-list'));
    }
}
