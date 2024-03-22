<?php

namespace App\Actions\admin\iam\personnel;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Helper
use App\Helpers\Helper;

// Models
use App\Models\iam\personnel\User;

class StoreAction
{
    use AsAction;

    public function handle(Request $request)
    {

        $item = User::create($request->all());
        if ($request->has('password') && !is_null($request->password)) {
            $item->password = Hash::make($request->password);
            $item->save();
        }

        $role_item = \Spatie\Permission\Models\Role::find($item->role_id);
        $item->syncRoles($role_item);
        
        return $item;
    }
}
