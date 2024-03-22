<?php

namespace App\Listeners\activity\admin\cms\lecture_schedules;

use App\Events\admin\cms\lecture_schedules\ViewEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

// Model
use App\Models\Activity\ActivityLog;

class ViewListener
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
     * @param  \App\Events\admin\cms\lecture_schedules\ViewEvent  $event
     * @return void
     */
    public function handle(ViewEvent $event)
    {
        $this->title = 'Lecture Schedule Student Present Updated';
        $this->action = $event->user_item->getActivityTitle() . ' view lecture schedule  '.$event->action.' '.$event->lecture_schedule_item->getActivityTitle();

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
