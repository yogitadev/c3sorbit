<?php

namespace App\Http\Controllers\admin\course\programcodes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Event
use App\Events\admin\course\programcodes\ReorderEvent;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\course\Programcode;

class UpdateOrderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if(!Helper::checkPermission('programcodes.edit')){
            return redirect()->route('admin-dashboard');
        }
        
        $user_item = Auth::user();

        if ($request->has('items') && count($request->get('items')) > 0) {
            $counter = 1;
            $item_list = [];
            $changesArr = [];
            foreach ($request->get('items') as $item) {
                $item = Programcode::where('id', $item)->first();
                if (!is_null($item)) {
                    $item->sort_order = $counter;
                    $item->save();

                    $changesArr[]['field_title'] = $item->program_name;
                    $item_list[] = $item->id;
                    $counter++;
                }
            }
            if (count($item_list) > 0 && count($changesArr) > 0) {
                // Call Event
                ReorderEvent::dispatch([
                    'user_item' => $user_item,
                    'item_list' => $item_list,
                    'changes' => $changesArr
                ]);
            }
            flash('Programcodes are sorted successfully!')->success();
        }
    }
}
