<?php

namespace App\Http\Controllers\admin\campaign\campus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\campaign\campus\StoreRequest;

// Models
use App\Models\campaign\Institution;

// Action
use App\Actions\admin\campaign\campus\StoreAction;

// Event
use App\Events\admin\campaign\campus\CreateEvent;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreRequest $request)
    {

        $user_item = Auth::user();

        $campus_item = StoreAction::make()->handle($request);

        $changes = Helper::getModelChanges($campus_item);

        // Call Event
        CreateEvent::dispatch([
            'user_item' => $user_item,
            'campus_item' => $campus_item,
            'changes' => $changes,
        ]);

        flash('Campus Created Successfully.')->success();
        return redirect(route('campus-list'));
    }
}
