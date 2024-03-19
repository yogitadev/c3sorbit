<?php

return [
    'app_url' => env('APP_URL'),
    'app_name' => env('APP_NAME'),
    'date' => [
        'db_date_format' => env('DB_DATE_FORMAT', 'Y-m-d'),
        'db_date_time_format' => env('DB_DATE_TIME_FORMAT', 'Y-m-d H:i:s'),
        'date_format' => env('DATE_FORMAT', 'd/m/Y'),
        'date_time_format_without_second' => env('DATE_TIME_FORMAT_WITHOUT_SECOND', 'd/m/Y H:i'),
        'date_time_format' => env('DATE_TIME_FORMAT', 'd/m/Y H:i:s'),
        'fancy_date_time_format' => env('FANCY_DATE_TIME_FORMAT', 'd/m/Y - H:i'),
        'news_date_format' => env('NEWS_DATE_FORMAT', 'l, jS F Y'),
        'article_date_format'=>env('NEWS_DATE_FORMAT', 'l jS F Y'),
    ],
    'send_email' => false,
];
