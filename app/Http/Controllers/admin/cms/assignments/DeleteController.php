<?php

namespace App\Http\Controllers\admin\cms\assignments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Event
use App\Events\admin\cms\assignments\DeleteEvent;

// Models
use App\Models\cms\Assignment;

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
        if(!Helper::checkPermission('assignments.delete')){
            return redirect()->route('admin-dashboard');
        }

        $user_item = Auth::user();

        $item = Assignment::where('unique_id', $unique_id)->firstOrFail();
        
        $assignment_item_temp = $item;
        $item->delete();

        // Call Event
        DeleteEvent::dispatch([
            'user_item' => $user_item,
            'assignment_item' => $assignment_item_temp,
        ]);
        flash('Assignment Deleted Successfully.')->success();
        
    }
}
