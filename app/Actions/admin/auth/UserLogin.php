<?php

namespace App\Actions\admin\auth;

use Lorisleiva\Actions\Concerns\AsAction;

use Illuminate\Http\Request;

// Models
use App\Models\iam\personnel\User;

class UserLogin
{
    use AsAction;

    public function handle(User $user_item, Request $request)
    {

        $user_item->last_login_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $user_item->save();
    }
}
