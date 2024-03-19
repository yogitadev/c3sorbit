<?php

namespace App\Actions\admin\cms\lecture_schedules;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Models
use App\Models\cms\LectureSchedule;

// Helper
use App\Helpers\Helper;

class UpdateAction
{
    use AsAction;

    public function handle(LectureSchedule $item, Request $request)
    {
        $item->fill($request->all());
        return $item;
    }
}
