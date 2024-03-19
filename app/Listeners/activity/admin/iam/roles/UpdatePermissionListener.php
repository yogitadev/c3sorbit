<?php

namespace App\Listeners\activity\admin\iam\roles;

use App\Events\admin\iam\roles\UpdatePermissionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

// Models
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
        $this->title = 'Permissions Updated';
        $this->action = $event->user_item->getActivityTitle() . ' updated permission on role '.$event->role_item->getActivityTitle();

        ActivityLog::addLog([
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
                'Role' => $event->role_item->id,
            ]
        ]);
    }
}

