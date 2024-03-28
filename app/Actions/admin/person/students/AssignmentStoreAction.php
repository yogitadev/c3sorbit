<?php

namespace App\Actions\admin\person\students;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Models
use App\Models\person\StudentAssignmentSubmit;

// Helper
use App\Helpers\Helper;

class AssignmentStoreAction
{
    use AsAction;

    public function handle(Request $request)
    {
        $request['submission_date'] = date('Y-m-d');
        $item = StudentAssignmentSubmit::create($request->all());
        if ($request->has('media') && !is_null($request->file('media'))) {
            $returnArr = Helper::uploadFile($request->file('media'));
            $item->media_id = $returnArr['mediaObj']->id;
            $item->save();
        }
        return $item;
    }
}
