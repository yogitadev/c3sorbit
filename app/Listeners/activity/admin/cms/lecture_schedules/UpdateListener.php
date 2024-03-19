<?php

namespace App\Listeners\activity\admin\cms\lecture_schedules;

use App\Events\admin\cms\lecture_schedules\UpdateEvent;
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
     * @param  \App\Events\admin\cms\lecture_schedules\UpdateEvent  $event
     * @return void
     */
    public function handle(UpdateEvent $event)
    {
        $this->title = 'Lecture Schedule Updated';
        $this->action = $event->user_item->getActivityTitle() . ' updated lecture schedule  '.$event->action.' '.$event->lecture_schedule_item->getActivityTitle();

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
