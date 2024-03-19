<?php

namespace App\Actions\admin\cms\subjects;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Models
use App\Models\cms\Subject;

// Helper
use App\Helpers\Helper;

class UpdateAction
{
    use AsAction;

    public function handle(Subject $item, Request $request)
    {
        $item->fill($request->all());
        return $item;
    }
}
