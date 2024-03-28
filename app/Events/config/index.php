<?php

$event_arr = [];

$all_events = [

    // Admin Event

    'login' => include(base_path('app/Events/config/admin/auth/login/index.php')),

    /* CMS */
    'countries' => include(base_path('app/Events/config/admin/cms/countries/index.php')),

    'awarding_bodys' => include(base_path('app/Events/config/admin/cms/awarding_bodys/index.php')),

    'subjects' => include(base_path('app/Events/config/admin/cms/subjects/index.php')),

    'lecture_schedules' => include(base_path('app/Events/config/admin/cms/lecture_schedules/index.php')),

    'assignments' => include(base_path('app/Events/config/admin/cms/assignments/index.php')),

    /* Campaign Management */

    'institutions' => include(base_path('app/Events/config/admin/campaign/institutions/index.php')),

    'campus' => include(base_path('app/Events/config/admin/campaign/campus/index.php')),

    /* Course Management */

    'programcodes' => include(base_path('app/Events/config/admin/course/programcodes/index.php')),

    /*Person */

    'person' => include(base_path('app/Events/config/admin/person/faculties/index.php')),

    'students' => include(base_path('app/Events/config/admin/person/students/index.php')),
   
    /*Iam */

    'roles' => include(base_path('app/Events/config/admin/iam/roles/index.php')),

    'modules' => include(base_path('app/Events/config/admin/iam/modules/index.php')),
    
    'users' => include(base_path('app/Events/config/admin/iam/personnel/index.php')),

    
    // Front Event

];

if (is_array($all_events) && count($all_events) > 0) {
    foreach ($all_events as $events) {
        if (is_array($events) && count($events) > 0) {
            $event_arr = array_merge($event_arr, $events);
        }
    }
}


return $event_arr;
