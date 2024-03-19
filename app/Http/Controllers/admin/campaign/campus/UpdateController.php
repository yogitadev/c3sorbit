<?php

namespace App\Http\Controllers\admin\campaign\campus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\campaign\campus\UpdateRequest;

// Models
use App\Models\campaign\Campus;

// Actions
use App\Actions\admin\campaign\campus\UpdateAction;

// Event
use App\Events\admin\campaign\campus\UpdateEvent;

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

        $item = Campus::where('unique_id', $unique_id)->firstOrFail();

        $item_temp = $item->replicate();
        
        $campus_item = UpdateAction::make()->handle($item, $request);

        $changes = Helper::getModelChanges($campus_item);

        // Check for Parent Category change [Start]
        if ($campus_item->institution_id != $item_temp->institution_id) {
            $changes[] = [
                'field_name' => 'institution_id',
                'field_title' => 'Institution',
                'old_value' => !is_null($item_temp->institution) ? $item_temp->institution->name : null,
                'new_value' => !is_null($campus_item->institution) ? $campus_item->institution->name : null,
            ];
        }
        // Check for Parent Category change [End]
        
        $item->save();

         // Call Event
         UpdateEvent::dispatch([
            'user_item' => $user_item,
            'campus_item' => $campus_item,
            'changes' => $changes,
            'action' => '-'
        ]);

        flash('Campus Updated Successfully.')->success();
        return redirect(route('campus-list'));

    }
}
