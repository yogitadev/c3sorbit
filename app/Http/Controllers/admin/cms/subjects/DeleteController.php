<?php

namespace App\Http\Controllers\admin\cms\subjects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Event
use App\Events\admin\cms\subjects\DeleteEvent;

// Models
use App\Models\cms\Subject;

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
        if(!Helper::checkPermission('subjects.delete')){
            return redirect()->route('admin-dashboard');
        }

        $user_item = Auth::user();

        $item = Subject::where('unique_id', $unique_id)->firstOrFail();
        
        $subject_item_temp = $item;
        $item->delete();

        // Call Event
        DeleteEvent::dispatch([
            'user_item' => $user_item,
            'subject_item' => $subject_item_temp,
        ]);
        flash('Subject deleted Successfully.')->success();
        
    }
}
