<?php


return [

    // Auth Events and Listeners

    \App\Events\admin\cms\assignments\CreateEvent::class => [
        \App\Listeners\activity\admin\cms\assignments\CreateListener::class,
    ],

    \App\Events\admin\cms\assignments\UpdateEvent::class => [
        \App\Listeners\activity\admin\cms\assignments\UpdateListener::class,
    ],


    \App\Events\admin\cms\assignments\DeleteEvent::class => [
        \App\Listeners\activity\admin\cms\assignments\DeleteListener::class,
    ],

    \App\Events\admin\cms\assignments\ReorderEvent::class => [
        \App\Listeners\activity\admin\cms\assignments\ReorderListener::class,
    ],

];
