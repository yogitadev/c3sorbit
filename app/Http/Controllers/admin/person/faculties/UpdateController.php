<?php

namespace App\Http\Controllers\admin\person\faculties;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\person\faculties\UpdateRequest;

// Models
use App\Models\person\Faculty;

// Action
use App\Actions\admin\person\faculties\UpdateAction;

// Event
use App\Events\admin\person\faculties\UpdateEvent;

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
        if(!Helper::checkPermission('faculties.edit')){
            return redirect()->route('admin-dashboard');
        }

        $user_item = Auth::user();

        $item = Faculty::where('unique_id', $unique_id)->firstOrFail();
        $faculty_item = UpdateAction::make()->handle($item, $request);
        $changes = Helper::getModelChanges($faculty_item);
        $item->save();

         // Call Event
         UpdateEvent::dispatch([
            'user_item' => $user_item,
            'faculty_item' => $faculty_item,
            'changes' => $changes,
            'action' => '-'
        ]);

        flash('Faculty Updated Successfully.')->success();
        return redirect(route('faculty-list'));
    }
}
