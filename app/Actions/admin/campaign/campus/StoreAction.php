<?php

namespace App\Actions\admin\campaign\Campus;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\campaign\Campus;

class StoreAction
{
    use AsAction;

    public function handle(Request $request)
    {
       
        $item = Campus::create($request->all());
        return $item;
    }
}
