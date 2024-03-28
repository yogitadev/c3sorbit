<?php

namespace App\Events\admin\person\students;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AssignmentCreateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_item;
    public $student_item;
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
        $this->student_item = $params['student_item'];
        $this->changes = $params['changes'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
