<?php


return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', 'email'),

    'email' => [
        'email' => env('LOG_EMAIL', 'example@example.com'),
    ],

    'database' => [
        // settings
    ],

    'file' => [
        'path' => storage_path('logs/laravel.log'),
        'level' => 'debug',
    ],


];
