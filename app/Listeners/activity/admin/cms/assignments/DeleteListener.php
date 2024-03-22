<?php

namespace App\Listeners\activity\admin\cms\assignments;

use App\Events\admin\cms\assignments\DeleteEvent;
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
     * @param  \App\Events\admin\cms\assignments\DeleteEvent  $event
     * @return void
     */
    public function handle(DeleteEvent $event)
    {
        $this->title = 'Assignment Deleted';
        $this->action = $event->user_item->getActivityTitle() . ' deleted assignment ' . $event->assignment_item->getActivityTitle(false);

        ActivityLog::addLog([
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
                'Assignment' => null,
            ]
        ]);
    }
}
