<?php

namespace App\Listeners\activity\admin\iam\personnel;

use App\Events\admin\iam\personnel\UpdateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

// Model
use App\Models\Activity\ActivityLog;

class UpdateListener
{
    private $title;
    private $action;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\admin\iam\personnel\UpdateEvent  $event
     * @return void
     */
    public function handle(UpdateEvent $event)
    {
        $this->title = 'Users Updated';
        $this->action = $event->user_item->getActivityTitle() . ' updated users  '.$event->action.' '.$event->users_item->getActivityTitle();

        ActivityLog::addLog([
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
                'Users' => $event->users_item->id,
            ],
            'changes' => $event->changes
        ]);
    }
}
