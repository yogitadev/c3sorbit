<?php

namespace App\Listeners\activity\admin\cms\lecture_schedules;

use App\Events\admin\cms\lecture_schedules\DeleteEvent;
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
     * @param  \App\Events\admin\cms\lecture_schedules\DeleteEvent  $event
     * @return void
     */
    public function handle(DeleteEvent $event)
    {
        $this->title = 'Lecture Schedule Deleted';
        $this->action = $event->user_item->getActivityTitle() . ' deleted lecture schedule ' . $event->lecture_schedule_item->getActivityTitle(false);

        ActivityLog::addLog([
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
                'Lecture Schedule' => null,
            ]
        ]);
    }
}
