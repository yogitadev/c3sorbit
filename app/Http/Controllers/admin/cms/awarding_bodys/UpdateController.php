<?php

namespace App\Http\Controllers\admin\cms\awarding_bodys;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\cms\awarding_bodys\UpdateRequest;

// Models
use App\Models\cms\AwardingBody;

// Action
use App\Actions\admin\cms\awarding_bodys\UpdateAction;

// Event
use App\Events\admin\cms\awarding_bodys\UpdateEvent;

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
        if(!Helper::checkPermission('awarding_bodys.edit')){
            return redirect()->route('admin-dashboard');
        }
        
        $user_item = Auth::user();
        
        $item = AwardingBody::where('unique_id', $unique_id)->firstOrFail();
        $awarding_body_item = UpdateAction::make()->handle($item, $request);
        $changes = Helper::getModelChanges($awarding_body_item);
        $item->save();

         // Call Event
         UpdateEvent::dispatch([
            'user_item' => $user_item,
            'awarding_body_item' => $awarding_body_item,
            'changes' => $changes,
            'action' => '-'
        ]);

        flash('Awarding Body Updated Successfully.')->success();
        return redirect(route('awarding-body-list'));
    }
}
