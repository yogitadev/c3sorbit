<?php

namespace App\Actions\admin\iam\roles;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Models
use App\Models\iam\Role;

// Helper
use App\Helpers\Helper;

class StoreAction
{
    use AsAction;

    public function handle(Request $request)
    {
        $request['guard_name'] = 'web';
        $item = Role::create($request->all());
        return $item;
    }
}
