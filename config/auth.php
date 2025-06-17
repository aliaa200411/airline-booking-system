<?php

return [

    'defaults' => [
        'guard' => 'passenger',
        'passwords' => 'passengers',
    ],

    'guards' => [
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'passenger' => [
            'driver' => 'session',
            'provider' => 'passengers',
        ],
    ],

    'providers' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        'passengers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Passenger::class,
        ],
    ],

    'passwords' => [
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'passengers' => [
            'provider' => 'passengers',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
