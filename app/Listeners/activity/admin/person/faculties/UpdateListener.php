<?php

namespace App\Listeners\activity\admin\person\faculties;

use App\Events\admin\person\faculties\UpdateEvent;
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
     * @param  \App\Events\admin\person\faculties\UpdateEvent  $event
     * @return void
     */
    public function handle(UpdateEvent $event)
    {
        $this->title = 'Faculty Updated';
        $this->action = $event->user_item->getActivityTitle() . ' updated faculty  '.$event->action.' '.$event->faculty_item->getActivityTitle();

        ActivityLog::addLog([
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
                'Faculty' => $event->faculty_item->id,
            ],
            'changes' => $event->changes
        ]);
    }
}
