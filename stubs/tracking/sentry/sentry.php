<?php

return [

    'dsn' => env('SENTRY_DSN'),

    // Capture release as git latest tag
    'release' => env('APP_ENV') !== 'testing'
        ? trim(exec('git describe --abbrev=0'))
        : '',

    'breadcrumbs' => [
        // Capture Laravel logs in breadcrumbs
        'logs' => true,

        // Capture SQL queries in breadcrumbs
        'sql_queries' => true,

        // Capture bindings on SQL queries logged in breadcrumbs
        'sql_bindings' => true,

        // Capture queue job information in breadcrumbs
        'queue_info' => true,

        // Capture command information in breadcrumbs
        'command_info' => true,
    ],

    // @see: https://docs.sentry.io/error-reporting/configuration/?platform=php#send-default-pii
    'send_default_pii' => true,

];
