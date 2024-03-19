<?php

namespace App\Events\admin\auth\login;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ForgetPasswordEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $users_item;
    public $changes;
    public $log_type = 'Forget Password';
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->users_item = $params['users_item'];
        $this->changes = $params['changes'];
    }

}
