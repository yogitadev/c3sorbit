<?php

namespace App\Actions\admin\cms\subjects;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Models
use App\Models\cms\Subject;

// Helper
use App\Helpers\Helper;

class StoreAction
{
    use AsAction;

    public function handle(Request $request)
    {
        $item = Subject::create($request->all());
        return $item;
    }
}
