<?php

namespace App\Listeners\activity\admin\cms\subjects;

use App\Events\admin\cms\subjects\ExamCreateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

// Model
use App\Models\Activity\ActivityLog;

class ExamCreateListener
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
     * @param  \App\Events\admin\cms\subjects\ExamCreateEvent  $event
     * @return void
     */
    public function handle(ExamCreateEvent $event)
    {
        $this->title = 'Exam Paper Created';
        $this->action = $event->user_item->getActivityTitle() . ' created a new exam paper '.$event->exam_item->getActivityTitle();

        ActivityLog::addLog([
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
                'Exam' => $event->exam_item->id,
            ],
            'changes' => $event->changes
        ]);
    }
}
