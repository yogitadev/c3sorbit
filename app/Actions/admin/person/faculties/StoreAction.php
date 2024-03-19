<?php

namespace App\Actions\admin\person\faculties;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Models
use App\Models\person\Faculty;

// Helper
use App\Helpers\Helper;

class StoreAction
{
    use AsAction;

    public function handle(Request $request)
    {
        $item = Faculty::create($request->all());
        if ($request->has('media') && !is_null($request->file('media'))) {
            $returnArr = Helper::uploadFile($request->file('media'));
            $item->media_id = $returnArr['mediaObj']->id;
            $item->save();
        }
        return $item;
    }
}
