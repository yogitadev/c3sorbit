<?php

namespace App\Listeners\activity\admin\cms\awarding_bodys;

use App\Events\admin\cms\awarding_bodys\ReorderEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

// Model
use App\Models\Activity\ActivityLog;

class ReorderListener
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
     * @param  \App\Events\admin\cms\awarding_bodys\ReorderEvent  $event
     * @return void
     */
    public function handle(ReorderEvent $event)
    {
        $this->title = 'Awarding Body Reorder';
        $this->action = $event->user_item->getActivityTitle() . ' reordered awarding body';

        ActivityLog::addLog([
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
                'Awarding Body' => $event->item_list,
            ],
            'changes' => $event->changes
        ]);
    }
}
