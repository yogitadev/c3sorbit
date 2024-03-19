<?php

namespace App\Events\admin\cms\countries;

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
    public $country_item;
    public $changes;
    public $log_type = 'Create';

    /**
     * Create a new event instance.
     */
    public function __construct($params)
    {
        $this->user_item = $params['user_item'];
        $this->country_item = $params['country_item'];
        $this->changes = $params['changes'];
    }
}
