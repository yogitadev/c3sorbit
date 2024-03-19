<?php

namespace App\Http\Controllers\admin\campaign\campus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Event
use App\Events\admin\campaign\campus\DeleteEvent;

// Models
use App\Models\campaign\Campus;

// Helper
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
        if(!Helper::checkPermission('campus.delete')){
            return redirect()->route('admin-dashboard');
        }
        
        $user_item = Auth::user();
        
        $item = Campus::where('unique_id', $unique_id)->firstOrFail();

        $campus_item_temp = $item;
        $item->delete();

        // Call Event
        DeleteEvent::dispatch([
            'user_item' => $user_item,
            'campus_item' => $campus_item_temp,
        ]);

        flash('Campus deleted Successfully.')->success();
    }
}
