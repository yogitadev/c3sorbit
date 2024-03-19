<?php

namespace App\Http\Controllers\admin\iam\personnel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Event
use App\Events\admin\iam\personnel\DeleteEvent;

// Models
use App\Models\iam\personnel\User;

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

        $item = User::where('unique_id', $unique_id)->firstOrFail();
        $users_item_temp = $item;
        $item->deleted_at = now();
        $item->status = 'Deleted';
        $item->save();

        // Call Event
        DeleteEvent::dispatch([
            'user_item' => $user_item,
            'users_item' => $users_item_temp,
        ]);

        flash('User deleted Successfully.')->success();
    }
}
