<?php

namespace App\Actions\admin\auth;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;
use Str;

// Models
use App\Models\iam\personnel\User;

class UserForgetPassword
{
    use AsAction;

    public function handle(Request $request)
    {
        $params = $request->all();
        $user_item = User::where('email', $params['email'])->first();
        
        if($user_item != null) {
            $user_item->remember_token = Str::upper(Str::random(50));
            $user_item->save();
        }
        //dd($user_item);
        return $user_item;
    }
}
