<?php

namespace App\Http\Controllers\admin\course\programcodes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\course\programcodes\UpdateRequest;

// Models
use App\Models\course\Programcode;

// Actions
use App\Actions\admin\course\programcodes\UpdateAction;

// Event
use App\Events\admin\course\programcodes\UpdateEvent;

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
        if(!Helper::checkPermission('programcodes.edit')){
            return redirect()->route('admin-dashboard');
        }
        
        $user_item = Auth::user();
        
        $item = Programcode::where('unique_id', $unique_id)->firstOrFail();

        $item_temp = $item->replicate();
        
        $programcode_item = UpdateAction::make()->handle($item, $request);

        $changes = Helper::getModelChanges($programcode_item);

        // Check for Parent Category change [Start]
        if ($programcode_item->institution_id != $item_temp->institution_id) {
            $changes[] = [
                'field_name' => 'institution_id',
                'field_title' => 'Institution',
                'old_value' => !is_null($item_temp->institution) ? $item_temp->institution->name : null,
                'new_value' => !is_null($programcode_item->institution) ? $programcode_item->institution->name : null,
            ];
        }
        if ($programcode_item->campus_id != $item_temp->campus_id) {
            $changes[] = [
                'field_name' => 'campus_id',
                'field_title' => 'Campus',
                'old_value' => !is_null($item_temp->campus) ? $item_temp->campus->name : null,
                'new_value' => !is_null($programcode_item->campus) ? $programcode_item->campus->name : null,
            ];
        }

        // Check for Parent Category change [End]
        
        $item->save();

         // Call Event
         UpdateEvent::dispatch([
            'user_item' => $user_item,
            'programcode_item' => $programcode_item,
            'changes' => $changes,
            'action' => '-'
        ]);

        flash('Programcode Updated Successfully.')->success();
        return redirect(route('programcode-list'));

    }
}
