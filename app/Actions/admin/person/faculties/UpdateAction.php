<?php

namespace App\Actions\admin\person\faculties;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Models
use App\Models\person\Faculty;

// Helper
use App\Helpers\Helper;

class UpdateAction
{
    use AsAction;

    public function handle(Faculty $item, Request $request)
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
