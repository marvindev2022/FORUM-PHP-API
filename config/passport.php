<?php

return [
    'default' => 'passport',

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

    'password_grant' => [
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
    ],
    'oauth_clients' => 'oauth_clients',

    'personal_access_client_id' => env('PERSONAL_ACCESS_CLIENT_ID', 2),

    'personal_access_entity' => \Laravel\Passport\Bridge\PersonalAccessGrant::class,

    'tokens_expense_at' => null,

    'auth_codes' => [
        'expire' => 60,
        'provider' => 'users',
        'table' => 'oauth_auth_codes',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'passport',
            'provider' => 'users',
            'hash' => false,
        ],
    ],

    'grant_type' => 'password',

    'clients' => [
        'password_client_id' => env('PASSWORD_CLIENT_ID', 3),
        'password_client_secret' => env('PASSWORD_CLIENT_SECRET', ''),
    ],

    'clients_expire' => 10,

    'scopes' => [],

    'enable_client_creation' => false,
];
