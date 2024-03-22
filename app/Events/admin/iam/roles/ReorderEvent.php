<?php

namespace App\Events\admin\iam\roles;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReorderEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_item;
    public $item_list;
    public $changes;
    public $log_type = 'Reorder';

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->user_item = $params['user_item'];
        $this->item_list = $params['item_list'];
        $this->changes = $params['changes'];
    }
}
