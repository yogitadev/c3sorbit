<?php

namespace App\Listeners\activity\admin\iam\personnel;

use App\Events\admin\iam\personnel\ReorderEvent;
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
     * @param  \App\Events\admin\iam\personnel\ReorderEvent  $event
     * @return void
     */
    public function handle(ReorderEvent $event)
    {
        $this->title = 'Users Reorder';
        $this->action = $event->user_item->getActivityTitle() . ' reordered users';

        ActivityLog::addLog([
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
                'Users' => $event->item_list,
            ],
            'changes' => $event->changes
        ]);
    }
}
