<?php

namespace App\Listeners\Activity\admin\cms\countries;

use App\Events\admin\cms\countries\UpdateEvent;
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
     * @param  \App\Events\admin\cms\countries\UpdateEvent  $event
     * @return void
     */
    public function handle(UpdateEvent $event): void
    {
        $this->title = 'Country Updated';
        $this->action = $event->user_item->getActivityTitle() . ' updated country  '.$event->action.' '.$event->country_item->getActivityTitle();

        ActivityLog::addLog([
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
                'Country' => $event->country_item->id,
            ],
            'changes' => $event->changes
        ]);
    }
}
