<?php

namespace App\Listeners\activity\admin\iam\personnel;

use App\Events\admin\iam\personnel\CreateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

// Model
use App\Models\Activity\ActivityLog;

class CreateListener
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
     * @param  \App\Events\admin\iam\personnel\CreateEvent  $event
     * @return void
     */
    public function handle(CreateEvent $event)
    {
        $this->title = 'Users Created';
        $this->action = $event->user_item->getActivityTitle() . ' created a new user '.$event->users_item->getActivityTitle();

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
