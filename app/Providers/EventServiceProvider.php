<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [];

    /**
     * The model observers for your application.
     *
     * @var array
     */
    protected $observers = [];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // Events
        $all_events = include(base_path('app/Events/config/index.php'));
        $this->listen = array_merge($this->listen, $all_events);

        foreach ($all_events as $event => $listeners){
            foreach ($listeners as $listener){
                Event::listen($event, $listener);
            }
        }
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
