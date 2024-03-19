<?php

namespace App\Http\Controllers\admin\campaign\institutions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\campaign\institutions\StoreRequest;

// Models
use App\Models\campaign\Institution;

// Action
use App\Actions\admin\campaign\institutions\StoreAction;

// Event
use App\Events\admin\campaign\institutions\CreateEvent;

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
        if(!Helper::checkPermission('institutions.add')){
            return redirect()->route('admin-dashboard');
        }
        
        $user_item = Auth::user();

        $institution_item = StoreAction::make()->handle($request);
        
        $changes = Helper::getModelChanges($institution_item);

        // Call Event
        CreateEvent::dispatch([
            'user_item' => $user_item,
            'institution_item' => $institution_item,
            'changes' => $changes,
        ]);

        flash('Institution Created Successfully.')->success();
        return redirect(route('institution-list'));
    }
}
