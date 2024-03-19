<?php


return [

    // Auth Events and Listeners

    \App\Events\admin\campaign\institutions\CreateEvent::class => [
        \App\Listeners\activity\admin\campaign\institutions\CreateListener::class,
    ],

    \App\Events\admin\campaign\institutions\UpdateEvent::class => [
        \App\Listeners\activity\admin\campaign\institutions\UpdateListener::class,
    ],

    \App\Events\admin\campaign\institutions\DeleteEvent::class => [
        \App\Listeners\activity\admin\campaign\institutions\DeleteListener::class,
    ],

    \App\Events\admin\campaign\institutions\ReorderEvent::class => [
        \App\Listeners\activity\admin\campaign\institutions\ReorderListener::class,
    ],

];
