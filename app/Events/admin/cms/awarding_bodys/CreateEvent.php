<?php

namespace App\Events\admin\cms\awarding_bodys;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_item;
    public $awarding_body_item;
    public $changes;
    public $log_type = 'Create';

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->user_item = $params['user_item'];
        $this->awarding_body_item = $params['awarding_body_item'];
        $this->changes = $params['changes'];
    }
}
