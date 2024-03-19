<?php


return [

    // Auth Events and Listeners

    \App\Events\admin\iam\personnel\CreateEvent::class => [
        \App\Listeners\activity\admin\iam\personnel\CreateListener::class,
    ],

    \App\Events\admin\iam\personnel\UpdateEvent::class => [
        \App\Listeners\activity\admin\iam\personnel\UpdateListener::class,
    ],

    \App\Events\admin\iam\personnel\DeleteEvent::class => [
        \App\Listeners\activity\admin\iam\personnel\DeleteListener::class,
    ],

    \App\Events\admin\iam\personnel\ReorderEvent::class => [
        \App\Listeners\activity\admin\iam\personnel\ReorderListener::class,
    ],

];
