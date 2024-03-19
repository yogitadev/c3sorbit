<?php

namespace App\Http\Controllers\admin\person\faculties;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Event
use App\Events\admin\person\faculties\DeleteEvent;

// Models
use App\Models\person\Faculty;

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

        $item = Faculty::where('unique_id', $unique_id)->firstOrFail();
        
        $faculty_item_temp = $item;
        $item->delete();

        // Call Event
        DeleteEvent::dispatch([
            'user_item' => $user_item,
            'faculty_item' => $faculty_item_temp,
        ]);
        flash('Faculty deleted Successfully.')->success();
        
    }
}
