<?php

namespace App\Listeners\activity\admin\auth\login;

use App\Events\admin\auth\login\ForgetPasswordEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\Activity\ActivityLog;

class ForgetPasswordListener
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
     * @param  \App\Events\admin\auth\login\ForgetPasswordEvent  $event
     * @return void
     */
    public function handle(ForgetPasswordEvent $event)
    {
        $this->title = 'Forget Password Link Send';
        $this->action = $event->users_item->getActivityTitle() . ' has successfully send invitaion for forget password';

        ActivityLog::addLog([
            'activity_type' => 'Manual',
            'log_type' => $event->log_type ?? '',
            'title' => $this->title,
            'action' => $this->action,
            'user_id' => $event->users_item->id,
            'user_login_id' => $event->users_item->last_login->id ?? null,
            'location_id' => $event->users_item->last_login->location->id ?? null,
            'log_items' => [
                'User' => $event->users_item->id,
            ],
        ]);
    }
}
