<?php

namespace App\Http\Controllers\admin\iam\personnel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\admin\UserCreateEmail;
use Illuminate\Support\Facades\Mail;

// Helper
use App\Helpers\Helper;

// Request
use App\Http\Requests\admin\iam\personnel\StoreRequest;

// Action
use App\Actions\admin\iam\personnel\StoreAction;

// Event
use App\Events\admin\iam\personnel\CreateEvent;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreRequest $request)
    {
        $user_item = Auth::user();

        $users_item = StoreAction::make()->handle($request);

        $changes = Helper::getModelChanges($users_item);

        $password = $request['password'];
        if (config('env.send_email') == true) {
            Mail::to($users_item['email'])->send(new UserCreateEmail($users_item,$password));
        }

        // Call Event
        CreateEvent::dispatch([
            'user_item' => $user_item,
            'users_item' => $users_item,
            'changes' => $changes,
        ]);

        flash('Users Created Successfully.')->success();
        return redirect(route('personnel-list'));
    }
}
