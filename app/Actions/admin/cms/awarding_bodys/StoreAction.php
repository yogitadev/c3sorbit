<?php

namespace App\Actions\admin\cms\awarding_bodys;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Models
use App\Models\cms\AwardingBody;

// Helper
use App\Helpers\Helper;

class StoreAction
{
    use AsAction;

    public function handle(Request $request)
    {
        $item = AwardingBody::create($request->all());
        return $item;
    }
}
