<?php

return [

    'paths' => [
        'api/*', 
        'sanctum/csrf-cookie',
        'login',
        'logout'
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

  'allowed_headers' => ['*'],

    'exposed_headers' => [
        'Authorization',
        'X-CSRF-TOKEN'],

    'max_age' => 86400,

    'supports_credentials' => true,

];