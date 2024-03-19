<?php

namespace App\Listeners\activity\admin\cms\lecture_schedules;

use App\Events\admin\cms\lecture_schedules\CreateEvent;
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
     * @param  \App\Events\admin\cms\lecture_schedules\CreateEvent  $event
     * @return void
     */
    public function handle(CreateEvent $event)
    {
        $this->title = 'Lecture Schedule Created';
        $this->action = $event->user_item->getActivityTitle() . ' created a new lecture schedule '.$event->lecture_schedule_item->getActivityTitle();

        ActivityLog::addLog([
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
                'Lecture Schedule' => $event->lecture_schedule_item->id,
            ],
            'changes' => $event->changes
        ]);
    }
}
