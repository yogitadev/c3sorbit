<?php

namespace App\Http\Controllers\admin\cms\countries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\cms\countries\UpdateRequest;

// Models
use App\Models\cms\Country;

// Action
use App\Actions\admin\cms\countries\UpdateAction;

// Event
use App\Events\admin\cms\countries\UpdateEvent;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, UpdateRequest $request)
    {
        
        $user_item = Auth::user();

        $item = Country::where('id', $id)->firstOrFail();
        $country_item = UpdateAction::make()->handle($item, $request);
        $changes = Helper::getModelChanges($country_item);
        $item->save();

         // Call Event
         UpdateEvent::dispatch([
            'user_item' => $user_item,
            'country_item' => $country_item,
            'changes' => $changes,
            'action' => '-'
        ]);

        flash('Country Updated Successfully.')->success();
        return redirect(route('country-list'));
    }
}
