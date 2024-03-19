<?php

namespace App\Listeners\activity\admin\cms\awarding_bodys;

use App\Events\admin\cms\awarding_bodys\DeleteEvent;
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
     * @param  \App\Events\admin\cms\awarding_bodys\DeleteEvent  $event
     * @return void
     */
    public function handle(DeleteEvent $event)
    {
        $this->title = 'Awarding Body Deleted';
        $this->action = $event->user_item->getActivityTitle() . ' deleted awarding body ' . $event->awarding_body_item->getActivityTitle(false);

        ActivityLog::addLog([
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
                'Awarding Body' => null,
            ]
        ]);
    }
}
