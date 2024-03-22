<?php

namespace App\Actions\admin\cms\assignments;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Models
use App\Models\cms\Assignment;

// Helper
use App\Helpers\Helper;

class UpdateAction
{
    use AsAction;

    public function handle(Assignment $item, Request $request)
    {
        $item->fill($request->all());
        
        if ($request->has('media') && !is_null($request->file('media'))) {
            if (!is_null($item->media)) {
                Helper::deleteFile($item->media);
            }
            $returnArr = Helper::uploadFile($request->file('media'));
            $item->media_id = $returnArr['mediaObj']->id;
        }
        return $item;
    }
}
