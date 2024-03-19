<?php

namespace App\Actions\admin\cms\awarding_bodys;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Models
use App\Models\cms\AwardingBody;

// Helper
use App\Helpers\Helper;

class UpdateAction
{
    use AsAction;

    public function handle(AwardingBody $item, Request $request)
    {
        $item->fill($request->all());
        return $item;
    }
}
