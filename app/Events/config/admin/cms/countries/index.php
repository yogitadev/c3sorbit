<?php


return [

    // Auth Events and Listeners

    \App\Events\admin\cms\countries\CreateEvent::class => [
        \App\Listeners\activity\admin\cms\countries\CreateListener::class,
    ],

    \App\Events\admin\cms\countries\UpdateEvent::class => [
        \App\Listeners\activity\admin\cms\countries\UpdateListener::class,
    ],


    \App\Events\admin\cms\countries\DeleteEvent::class => [
        \App\Listeners\activity\admin\cms\countries\DeleteListener::class,
    ],

    \App\Events\admin\cms\countries\ReorderEvent::class => [
        \App\Listeners\activity\admin\cms\countries\ReorderListener::class,
    ],

];
