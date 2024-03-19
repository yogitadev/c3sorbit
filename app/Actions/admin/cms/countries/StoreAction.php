<?php

namespace App\Actions\admin\cms\countries;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Models
use App\Models\cms\Country;

// Helper
use App\Helpers\Helper;

class StoreAction
{
    use AsAction;

    public function handle(Request $request)
    {
        $item = Country::create($request->all());
        return $item;
    }
}
