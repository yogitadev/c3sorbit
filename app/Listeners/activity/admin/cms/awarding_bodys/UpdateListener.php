<?php

namespace App\Listeners\activity\admin\cms\awarding_bodys;

use App\Events\admin\cms\awarding_bodys\UpdateEvent;
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
     * @param  \App\Events\admin\cms\awarding_bodys\UpdateEvent  $event
     * @return void
     */
    public function handle(UpdateEvent $event)
    {
        $this->title = 'Awarding Body Updated';
        $this->action = $event->user_item->getActivityTitle() . ' updated awarding body  '.$event->action.' '.$event->awarding_body_item->getActivityTitle();

        ActivityLog::addLog([
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
                'Awarding body' => $event->awarding_body_item->id,
            ],
            'changes' => $event->changes
        ]);
    }
}
