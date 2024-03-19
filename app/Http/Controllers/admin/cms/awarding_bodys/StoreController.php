<?php

namespace App\Http\Controllers\admin\cms\awarding_bodys;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\cms\awarding_bodys\StoreRequest;

// Action
use App\Actions\admin\cms\awarding_bodys\StoreAction;

// Event
use App\Events\admin\cms\awarding_bodys\CreateEvent;

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
        if(!Helper::checkPermission('awarding_bodys.add')){
            return redirect()->route('admin-dashboard');
        }
        
        $user_item = Auth::user();

        $awarding_body_item = StoreAction::make()->handle($request);
        
        $changes = Helper::getModelChanges($awarding_body_item);

        // Call Event
        CreateEvent::dispatch([
            'user_item' => $user_item,
            'awarding_body_item' => $awarding_body_item,
            'changes' => $changes,
        ]);

        flash('Awarding Body Created Successfully.')->success();
        return redirect(route('awarding-body-list'));
    }
}
