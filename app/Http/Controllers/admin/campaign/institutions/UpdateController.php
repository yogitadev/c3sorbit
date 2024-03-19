<?php

namespace App\Http\Controllers\admin\campaign\institutions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\campaign\institutions\UpdateRequest;

// Models
use App\Models\campaign\Institution;

// Actions
use App\Actions\admin\campaign\institutions\UpdateAction;

// Event
use App\Events\admin\campaign\institutions\UpdateEvent;

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

        $item = Institution::where('unique_id', $unique_id)->with(['media'])->firstOrFail();
        $institution_item = UpdateAction::make()->handle($item, $request);
        $changes = Helper::getModelChanges($institution_item);
        $item->save();

         // Call Event
         UpdateEvent::dispatch([
            'user_item' => $user_item,
            'institution_item' => $institution_item,
            'changes' => $changes,
            'action' => '-'
        ]);

        flash('Institution Updated Successfully.')->success();
        return redirect(route('institution-list'));

    }
}
