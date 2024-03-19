<?php

namespace App\Actions\admin\cms\lecture_schedules;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Models
use App\Models\cms\LectureSchedule;

// Helper
use App\Helpers\Helper;

class StoreAction
{
    use AsAction;

    public function handle(Request $request)
    {
        $item = LectureSchedule::create($request->all());
        return $item;
    }
}
