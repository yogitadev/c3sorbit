<?php

namespace App\Actions\admin\iam\roles;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Models
use App\Models\iam\Role;

// Helper
use App\Helpers\Helper;

class UpdateAction
{
    use AsAction;

    public function handle(Role $item, Request $request)
    {
        $item->fill($request->all());
        return $item;
    }
}

