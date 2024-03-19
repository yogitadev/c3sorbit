<?php

namespace App\Listeners\activity\admin\iam\personnel;

use App\Events\admin\iam\personnel\DeleteEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

// Model
use App\Models\Activity\ActivityLog;

class DeleteListener
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
     * @param  \App\Events\admin\iam\personnel\DeleteEvent  $event
     * @return void
     */
    public function handle(DeleteEvent $event)
    {
        $this->title = 'Users Deleted';
        $this->action = $event->user_item->getActivityTitle() . ' deleted user ' . $event->users_item->getActivityTitle(false);

        ActivityLog::addLog([
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
                'Users' => null,
            ]
        ]);
    }
}
