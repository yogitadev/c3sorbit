<?php

namespace App\Http\Controllers\admin\course\programcodes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Event
use App\Events\admin\course\programcodes\DeleteEvent;


// Models
use App\Models\course\Programcode;

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
        if(!Helper::checkPermission('programcodes.delete')){
            return redirect()->route('admin-dashboard');
        }
        
        $user_item = Auth::user();

        $item = Programcode::where('unique_id', $unique_id)->firstOrFail();
        $programcode_item_temp = $item;
        $item->delete();

        // Call Event
        DeleteEvent::dispatch([
            'user_item' => $user_item,
            'programcode_item' => $programcode_item_temp,
        ]);

        flash('Programcode deleted Successfully.')->success();
    }
}
