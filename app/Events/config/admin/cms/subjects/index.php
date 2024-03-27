<?php


return [

    // Auth Events and Listeners

    \App\Events\admin\cms\subjects\CreateEvent::class => [
        \App\Listeners\activity\admin\cms\subjects\CreateListener::class,
    ],

    \App\Events\admin\cms\subjects\UpdateEvent::class => [
        \App\Listeners\activity\admin\cms\subjects\UpdateListener::class,
    ],


    \App\Events\admin\cms\subjects\DeleteEvent::class => [
        \App\Listeners\activity\admin\cms\subjects\DeleteListener::class,
    ],

    \App\Events\admin\cms\subjects\ReorderEvent::class => [
        \App\Listeners\activity\admin\cms\subjects\ReorderListener::class,
    ],

    // Exam Paper Event

    \App\Events\admin\cms\subjects\ExamCreateEvent::class => [
        \App\Listeners\activity\admin\cms\subjects\ExamCreateListener::class,
    ],

    \App\Events\admin\cms\subjects\ExamUpdateEvent::class => [
        \App\Listeners\activity\admin\cms\subjects\ExamUpdateListener::class,
    ],


    \App\Events\admin\cms\subjects\ExamDeleteEvent::class => [
        \App\Listeners\activity\admin\cms\subjects\ExamDeleteListener::class,
    ],

];
