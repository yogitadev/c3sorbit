<?php

namespace App\Events\admin\cms\lecture_schedules;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ViewEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_item;
    public $lecture_schedule_item;
    public $action;
    public $changes;
    public $log_type = 'View';

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->user_item = $params['user_item'];
        $this->lecture_schedule_item = $params['lecture_schedule_item'];
        $this->action = $params['action'];
        $this->changes = $params['changes'];
    }
}
