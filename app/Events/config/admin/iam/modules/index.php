<?php


return [

    // Auth Events and Listeners

    \App\Events\admin\iam\modules\UpdatePermissionEvent::class => [
        \App\Listeners\activity\admin\iam\modules\UpdatePermissionListener::class,
    ],

];
