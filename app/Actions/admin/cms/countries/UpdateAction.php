<?php

namespace App\Actions\admin\cms\countries;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Models
use App\Models\cms\Country;

// Helper
use App\Helpers\Helper;

class UpdateAction
{
    use AsAction;

    public function handle(Country $item, Request $request)
    {
        $item->fill($request->all());
        return $item;
        
    }
}
