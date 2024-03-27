<?php

namespace App\Events\admin\cms\subjects;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ExamDeleteEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_item;
    public $exam_item;
    public $log_type = 'Delete';

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->user_item = $params['user_item'];
        $this->exam_item = $params['exam_item'];
    }
}
