<?php

namespace App\Actions\admin\campaign\institutions;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\campaign\Institution;

class UpdateAction
{
    use AsAction;

    public function handle(Institution $item, Request $request)
    {
        // dd($request->all());
        $item->fill($request->all());
       
        if ($request->has('media') && !is_null($request->file('media'))) {
            if (!is_null($item->media)) {
                Helper::deleteFile($item->media);
            }
            $returnArr = Helper::uploadFile($request->file('media'));
            $item->media_id = $returnArr['mediaObj']->id;
            //$item->save();
        }
        return $item;
    }
}
