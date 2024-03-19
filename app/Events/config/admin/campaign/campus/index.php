<?php


return [

    // Auth Events and Listeners

    \App\Events\admin\campaign\campus\CreateEvent::class => [
        \App\Listeners\activity\admin\campaign\campus\CreateListener::class,
    ],

    \App\Events\admin\campaign\campus\UpdateEvent::class => [
        \App\Listeners\activity\admin\campaign\campus\UpdateListener::class,
    ],

    \App\Events\admin\campaign\campus\DeleteEvent::class => [
        \App\Listeners\activity\admin\campaign\campus\DeleteListener::class,
    ],

    \App\Events\admin\campaign\campus\ReorderEvent::class => [
        \App\Listeners\activity\admin\campaign\campus\ReorderListener::class,
    ],

];
