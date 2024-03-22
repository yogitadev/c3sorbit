<?php


return [

    // Auth Events and Listeners

    \App\Events\admin\cms\lecture_schedules\CreateEvent::class => [
        \App\Listeners\activity\admin\cms\lecture_schedules\CreateListener::class,
    ],

    \App\Events\admin\cms\lecture_schedules\UpdateEvent::class => [
        \App\Listeners\activity\admin\cms\lecture_schedules\UpdateListener::class,
    ],


    \App\Events\admin\cms\lecture_schedules\DeleteEvent::class => [
        \App\Listeners\activity\admin\cms\lecture_schedules\DeleteListener::class,
    ],

    \App\Events\admin\cms\lecture_schedules\ReorderEvent::class => [
        \App\Listeners\activity\admin\cms\lecture_schedules\ReorderListener::class,
    ],

    \App\Events\admin\cms\lecture_schedules\ViewEvent::class => [
        \App\Listeners\activity\admin\cms\lecture_schedules\ViewListener::class,
    ],

];
