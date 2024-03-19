<?php


return [

    // Auth Events and Listeners

    \App\Events\admin\course\programcodes\CreateEvent::class => [
        \App\Listeners\activity\admin\course\programcodes\CreateListener::class,
    ],

    \App\Events\admin\course\programcodes\UpdateEvent::class => [
        \App\Listeners\activity\admin\course\programcodes\UpdateListener::class,
    ],

    \App\Events\admin\course\programcodes\DeleteEvent::class => [
        \App\Listeners\activity\admin\course\programcodes\DeleteListener::class,
    ],

    \App\Events\admin\course\programcodes\ReorderEvent::class => [
        \App\Listeners\activity\admin\course\programcodes\ReorderListener::class,
    ],

];
