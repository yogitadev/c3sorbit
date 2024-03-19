<?php

namespace App\Events\admin\person\faculties;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_item;
    public $faculty_item;
    public $action;
    public $changes;
    public $log_type = 'Update';

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->user_item = $params['user_item'];
        $this->faculty_item = $params['faculty_item'];
        $this->action = $params['action'];
        $this->changes = $params['changes'];
    }
}
