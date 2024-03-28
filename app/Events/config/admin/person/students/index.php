<?php


return [

    // Auth Events and Listeners

    \App\Events\admin\person\students\AssignmentCreateEvent::class => [
        \App\Listeners\activity\admin\person\students\AssignmentCreateListener::class,
    ],
];
