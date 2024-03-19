<?php

namespace App\Http\Controllers\admin\cms\countries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\cms\countries\StoreRequest;

// Action
use App\Actions\admin\cms\countries\StoreAction;

// Event
use App\Events\admin\cms\countries\CreateEvent;

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

        $country_item = StoreAction::make()->handle($request);
        
        $changes = Helper::getModelChanges($country_item);

        // Call Event
        CreateEvent::dispatch([
            'user_item' => $user_item,
            'country_item' => $country_item,
            'changes' => $changes,
        ]);

        flash('Country Created Successfully.')->success();
        return redirect(route('country-list'));
    }
}
