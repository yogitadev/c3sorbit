<?php

namespace App\Http\Controllers\admin\campaign\institutions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Event
use App\Events\admin\campaign\institutions\DeleteEvent;

// Models
use App\Models\campaign\Institution;

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
        $user_item = Auth::user();

        $item = Institution::where('unique_id', $unique_id)->firstOrFail();

        if ($request->has('media') && !is_null($request->file('media'))) {
            if (!is_null($item->media)) {
                Helper::deleteFile($item->media);
            }
        }
        $institution_item_temp = $item;
        $item->delete();

        // Call Event
        DeleteEvent::dispatch([
            'user_item' => $user_item,
            'institution_item' => $institution_item_temp,
        ]);

        flash('Institution deleted Successfully.')->success();
    }
}
