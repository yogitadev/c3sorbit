<?php

namespace App\Listeners\activity\admin\person\faculties;

use App\Events\admin\person\faculties\DeleteEvent;
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
     * @param  \App\Events\admin\person\faculties\DeleteEvent  $event
     * @return void
     */
    public function handle(DeleteEvent $event)
    {
        $this->title = 'Faculty Deleted';
        $this->action = $event->user_item->getActivityTitle() . ' deleted faculty ' . $event->faculty_item->getActivityTitle(false);

        ActivityLog::addLog([
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
                'Faculty' => null,
            ]
        ]);
    }
}
