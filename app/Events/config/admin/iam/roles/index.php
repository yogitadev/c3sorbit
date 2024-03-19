<?php


return [

    // Auth Events and Listeners

    \App\Events\admin\iam\roles\CreateEvent::class => [
        \App\Listeners\activity\admin\iam\roles\CreateListener::class,
    ],

    \App\Events\admin\iam\roles\UpdateEvent::class => [
        \App\Listeners\activity\admin\iam\roles\UpdateListener::class,
    ],

    \App\Events\admin\iam\roles\DeleteEvent::class => [
        \App\Listeners\activity\admin\iam\roles\DeleteListener::class,
    ],

    \App\Events\admin\iam\roles\ReorderEvent::class => [
        \App\Listeners\activity\admin\iam\roles\ReorderListener::class,
    ],

    \App\Events\admin\iam\roles\UpdatePermissionEvent::class => [
        \App\Listeners\activity\admin\iam\roles\UpdatePermissionListener::class,
    ],

];
