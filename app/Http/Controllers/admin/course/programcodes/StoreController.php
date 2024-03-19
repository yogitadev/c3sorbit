<?php

namespace App\Http\Controllers\admin\course\programcodes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\course\programcodes\StoreRequest;

// Models
use App\Models\course\Institution;

// Action
use App\Actions\admin\course\programcodes\StoreAction;

// Event
use App\Events\admin\course\programcodes\CreateEvent;

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

        $programcode_item = StoreAction::make()->handle($request);

        $changes = Helper::getModelChanges($programcode_item);

        // Call Event
        CreateEvent::dispatch([
            'user_item' => $user_item,
            'programcode_item' => $programcode_item,
            'changes' => $changes,
        ]);

        flash('Programcode Created Successfully.')->success();
        return redirect(route('programcode-list'));
    }
}
