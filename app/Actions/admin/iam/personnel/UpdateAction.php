<?php

namespace App\Actions\admin\iam\personnel;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\iam\personnel\User;

class UpdateAction
{
    use AsAction;

    public function handle(User $item, Request $request)
    {
        $item->fill($request->all());
        
        if ($request->has('password') && !is_null($request->password)) {
            $item->password = Hash::make($request->password);
        }
        $role_item = \Spatie\Permission\Models\Role::find($item->role_id);
        $item->syncRoles($role_item);
        return $item;
    }
}
