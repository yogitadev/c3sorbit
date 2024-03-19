<?php

namespace App\Http\Controllers\admin\iam\personnel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\iam\personnel\UpdateRequest;

// Models
use App\Models\iam\personnel\User;

// Actions
use App\Actions\admin\iam\personnel\UpdateAction;

// Event
use App\Events\admin\iam\personnel\UpdateEvent;

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
        $user_item = Auth::user();

        $item = User::where('unique_id', $unique_id)->firstOrFail();

        $item_temp = $item->replicate();
        
        $users_item = UpdateAction::make()->handle($item, $request);

        $changes = Helper::getModelChanges($users_item);


         // Call Event
         UpdateEvent::dispatch([
            'user_item' => $user_item,
            'users_item' => $users_item,
            'changes' => $changes,
            'action' => '-'
        ]);

        flash('User Updated Successfully.')->success();
        return redirect(route('personnel-list'));

    }
}
