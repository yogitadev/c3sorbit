<?php

namespace App\Listeners\activity\admin\iam\modules;

use App\Events\admin\iam\modules\UpdatePermissionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

// Model
use App\Models\Activity\ActivityLog;

class UpdatePermissionListener
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
    public function handle(UpdatePermissionEvent $event): void
    {
        $this->title = 'Module Permission Updated';
        $this->action = $event->user_item->getActivityTitle() . ' updated permissions for module  '.$event->module_item->getActivityTitle();

        ActivityLog::addLog([
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
                'Module' => $event->module_item->id,
            ],
            'changes' => $event->changes
        ]);
    }
}
          

