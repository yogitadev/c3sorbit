<?php

namespace App\Actions\admin\campaign\institutions;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\campaign\Institution;

class StoreAction
{
    use AsAction;

    public function handle(Request $request)
    {
       
        $item = Institution::create($request->all());
        
        if ($request->has('media') && !is_null($request->file('media'))) {
            $returnArr = Helper::uploadFile($request->file('media'));
            $item->media_id = $returnArr['mediaObj']->id;
            $item->save();
        }
        return $item;
    }
}
