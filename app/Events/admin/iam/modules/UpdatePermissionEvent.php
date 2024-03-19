<?php

namespace App\Events\admin\iam\modules;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdatePermissionEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_item;
    public $module_item;
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
        $this->module_item = $params['module_item'];
        $this->changes = $params['changes'];
    }
}
