<?php

namespace App\Actions\admin\campaign\Campus;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\campaign\Campus;

class UpdateAction
{
    use AsAction;

    public function handle(Campus $item, Request $request)
    {
        // dd($request->all());
        $item->fill($request->all());
        return $item;
    }
}
