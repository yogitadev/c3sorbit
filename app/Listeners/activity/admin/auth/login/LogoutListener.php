<?php

namespace App\Listeners\activity\admin\auth\login;

use App\Events\admin\auth\login\LogoutEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\Activity\ActivityLog;

class LogoutListener
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
     * @param  \App\Events\admin\auth\login\LogoutEvent  $event
     * @return void
     */
    public function handle(LogoutEvent $event)
    {
        $this->title = 'Logout Successful';
        $this->action = $event->user_item->getActivityTitle() . ' has successfully logged out';

        ActivityLog::addLog([
            'activity_type' => 'Manual',
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'log_items' => [
                'User' => $event->user_item->id,
            ],
        ]);
    }
}
