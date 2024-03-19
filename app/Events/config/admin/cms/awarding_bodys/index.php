<?php


return [

    // Auth Events and Listeners

    \App\Events\admin\cms\awarding_bodys\CreateEvent::class => [
        \App\Listeners\activity\admin\cms\awarding_bodys\CreateListener::class,
    ],

    \App\Events\admin\cms\awarding_bodys\UpdateEvent::class => [
        \App\Listeners\activity\admin\cms\awarding_bodys\UpdateListener::class,
    ],


    \App\Events\admin\cms\awarding_bodys\DeleteEvent::class => [
        \App\Listeners\activity\admin\cms\awarding_bodys\DeleteListener::class,
    ],

    \App\Events\admin\cms\awarding_bodys\ReorderEvent::class => [
        \App\Listeners\activity\admin\cms\awarding_bodys\ReorderListener::class,
    ],

];
