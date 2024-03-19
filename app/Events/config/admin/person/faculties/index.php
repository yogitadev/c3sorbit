<?php


return [

    // Auth Events and Listeners

    \App\Events\admin\person\faculties\CreateEvent::class => [
        \App\Listeners\activity\admin\person\faculties\CreateListener::class,
    ],

    \App\Events\admin\person\faculties\UpdateEvent::class => [
        \App\Listeners\activity\admin\person\faculties\UpdateListener::class,
    ],

    \App\Events\admin\person\faculties\DeleteEvent::class => [
        \App\Listeners\activity\admin\person\faculties\DeleteListener::class,
    ],

    \App\Events\admin\person\faculties\ReorderEvent::class => [
        \App\Listeners\activity\admin\person\faculties\ReorderListener::class,
    ],

];
