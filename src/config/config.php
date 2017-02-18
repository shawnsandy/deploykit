<?php

return [

    'commands' => [

        "default" => ['cd /var/www', 'git pull', 'php artisan cache:clear'],

        "migrate" => ['cd /var/www', 'git pull', 'php artisan migrate', 'php artisan cache:clear'],

        "update" => ['cd /var/www', 'git pull', 'composer update', 'php artisan migrate', 'php artisan cache:clear'],

    ],

    'limit_responses' => 200,

    'responses_per_page' => 20,


];

