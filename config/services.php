<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],
    'passport' => [
        'login_endpoint' => env('PASSPORT_LOGIN_ENDPOINT', 'http://api.compendium.test/oauth/token'),
        'client_id' => env('OAUTH_PASSWORD_GRANT_CLIENT_ID', 1),
        'client_secret' => env('OAUTH_PASSWORD_GRANT_CLIENT_SECRET', '1yTF4oJcMEE9jiA7Wg8b1CYFtslM8cBgaajR4Unb'),
    ]

];
