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
        shell_exec('composer require sentry/sentry-laravel -q');

        static::info('Change the configuration file');
        static::createOrReplaceFile(
            config_path('sentry.php'),
            __DIR__ . '/../../stubs/tracking/sentry/sentry.php'
        );

        static::info('Change the exceptions handler file');
        static::createOrReplaceFile(
            app_path('Exceptions/Handler.php'),
            __DIR__ . '/../../stubs/tracking/sentry/Handler.php'
        );

        static::info('Change the .env.example file');
        static::appendFile(
            base_path('.env.example'),
            __DIR__ . '/../../stubs/tracking/sentry/.env.example'
        );

        static::info('Change the .env file');
        static::appendFile(
            base_path('.env'),
            __DIR__ . '/../../stubs/tracking/sentry/.env.example'
        );

        // TODO: add sentry js
    }
}
