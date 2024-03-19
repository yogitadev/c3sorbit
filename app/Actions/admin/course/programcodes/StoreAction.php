<?php

namespace App\Actions\admin\course\programcodes;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\course\Programcode;

class StoreAction
{
    use AsAction;

    public function handle(Request $request)
    {
        $item = Programcode::create($request->all());
        
        if ($request->has('media') && !is_null($request->file('media'))) {
            $returnArr = Helper::uploadFile($request->file('media'));
            $item->media_id = $returnArr['mediaObj']->id;
            $item->save();
        }

        return $item;
    }
}
