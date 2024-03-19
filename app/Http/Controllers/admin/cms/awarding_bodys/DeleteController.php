<?php

namespace App\Http\Controllers\admin\cms\awarding_bodys;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Event
use App\Events\admin\cms\awarding_bodys\DeleteEvent;

// Models
use App\Models\cms\AwardingBody;

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

        $item = AwardingBody::where('unique_id', $unique_id)->firstOrFail();
        $awarding_body_item_temp = $item;
        $item->delete();

        // Call Event
        DeleteEvent::dispatch([
            'user_item' => $user_item,
            'awarding_body_item' => $awarding_body_item_temp,
        ]);
        flash('Awarding Body Deleted Successfully.')->success();
    }
}
