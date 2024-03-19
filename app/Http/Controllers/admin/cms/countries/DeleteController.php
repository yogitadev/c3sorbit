<?php

namespace App\Http\Controllers\admin\cms\countries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Event
use App\Events\admin\cms\countries\DeleteEvent;

// Models
use App\Models\cms\Country;

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
    public function __invoke($id, Request $request)
    {
        $user_item = Auth::user();

        $item = Country::where('id', $id)->firstOrFail();
        
        $country_item_temp = $item;
        $item->delete();

        // Call Event
        DeleteEvent::dispatch([
            'user_item' => $user_item,
            'country_item' => $country_item_temp,
        ]);
        flash('Country deleted Successfully.')->success();
        
    }
}
