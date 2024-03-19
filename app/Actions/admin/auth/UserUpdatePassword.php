<?php

namespace App\Actions\admin\auth;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Str;

// Models
use App\Models\iam\personnel\User;

class UserUpdatePassword
{
    use AsAction;

    public function handle(User $item, Request $request)
    {
        $params = $request->all();
        
        $request['password'] = Hash::make($request->new_password);
        $item->fill($request->all());
        return $item;
    }
}
