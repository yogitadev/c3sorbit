<?php

namespace App\Listeners\activity\admin\cms\countries;

use App\Events\admin\cms\countries\CreateEvent;
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
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateEvent $event): void
    {
        $this->title = 'Country Created';
        $this->action = $event->user_item->getActivityTitle() . ' created a new country '.$event->country_item->getActivityTitle();

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
