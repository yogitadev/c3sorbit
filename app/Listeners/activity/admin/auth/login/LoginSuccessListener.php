<?php

namespace App\Listeners\activity\admin\auth\login;

use App\Events\admin\auth\login\LoginSuccessEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

// Models
use App\Models\Activity\ActivityLog;

class LoginSuccessListener
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
     * @param  \App\Events\admin\auth\login\LoginSuccessEvent  $event
     * @return void
     */
    public function handle(LoginSuccessEvent $event)
    {
        $this->title = 'Login Successful';
        $this->action = $event->user_item->getActivityTitle() . ' has successfully logged in';

        ActivityLog::addLog([
            'activity_type' => 'Manual',
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->user_item->id,
            'user_login_id' => $event->user_item->last_login->id ?? null,
            'location_id' => $event->user_item->last_login->location->id ?? null,
            'log_items' => [
                'User' => $event->user_item->id,
            ],
        ]);
    }
}
