<?php

namespace App\Listeners\activity\admin\person\students;

use App\Events\admin\person\students\AssignmentCreateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

// Model
use App\Models\Activity\ActivityLog;

class AssignmentCreateListener
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
     * @param  \App\Events\admin\person\students\AssignmentCreateEvent  $event
     * @return void
     */
    public function handle(AssignmentCreateEvent $event)
    {
        $this->title = 'Student Assignment Submitted';
        $this->action = $event->user_item->getActivityTitle() . ' student assignment submitted'.$event->student_item->getActivityTitle();

        ActivityLog::addLog([
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
                'Student' => $event->student_item->id,
            ],
            'changes' => $event->changes
        ]);
    }
}
