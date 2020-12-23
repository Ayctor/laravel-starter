<?php

namespace Ayctor\LaravelStarter\Presets\Tracking;

use Ayctor\LaravelStarter\Presets\Preset;

class Sentry extends Preset
{
    protected $default = true;

    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the sentry preset installation');

        static::info('Run composer and artisan commands');
        shell_exec('composer require sentry/sentry-laravel -q -n');
        shell_exec('npm install -D --silent @sentry/browser @sentry/tracing @sentry/integrations');

        static::info('Change the configuration file');
        static::createOrReplaceFile(
            config_path('sentry.php'),
            __DIR__ . '/../../../stubs/tracking/sentry/sentry.php'
        );

        static::info('Change the exceptions handler file');
        static::createOrReplaceFile(
            app_path('Exceptions/Handler.php'),
            __DIR__ . '/../../../stubs/tracking/sentry/Handler.php'
        );

        static::info('Change the .env.example file');
        static::appendFile(
            base_path('.env.example'),
            __DIR__ . '/../../../stubs/tracking/sentry/.env.example'
        );

        static::info('Change the .env file');
        static::appendFile(
            base_path('.env'),
            __DIR__ . '/../../../stubs/tracking/sentry/.env.example'
        );

        static::info('Add the layouts directory with the default layout');
        static::createOrReplaceDirectory(
            resource_path('views/layouts'),
            __DIR__ . '/../../../stubs/tracking/sentry/layouts'
        );

        static::info('Add sentry js file');
        static::appendFile(
            resource_path('js/sentry.js'),
            __DIR__ . '/../../../stubs/tracking/sentry/sentry.js'
        );

        static::info('Add requires into the app.js file');
        static::appendFile(
            resource_path('js/app.js'),
            __DIR__ . '/../../../stubs/tracking/sentry/app.js'
        );
    }
}
