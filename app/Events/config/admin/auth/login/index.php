<?php


return [

    // Auth Events and Listeners
    \App\Events\admin\auth\login\LoginSuccessEvent::class => [
        \App\Listeners\activity\admin\auth\login\LoginSuccessListener::class,
    ],

    \App\Events\admin\auth\login\LogoutEvent::class => [
        \App\Listeners\activity\admin\auth\login\LogoutListener::class,
    ],

    \App\Events\admin\auth\login\ForgetPasswordEvent::class => [
        \App\Listeners\activity\admin\auth\login\ForgetPasswordListener::class,
    ],

    \App\Events\admin\auth\login\UpdatePasswordEvent::class => [
        \App\Listeners\activity\admin\auth\login\UpdatePasswordListener::class,
    ],
];
