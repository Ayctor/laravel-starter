<?php

namespace Ayctor\LaravelStarter\Presets\Tracking;

use Ayctor\LaravelStarter\Presets\Preset;

class Bugsnag extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the bugsnag preset installation');

        static::info('Run composer and artisan commands');
        shell_exec('composer require bugsnag/bugsnag-laravel -q');
        shell_exec('php artisan vendor:publish -q');

        static::info('Change the .env.example file');
        static::appendFile(
            base_path('.env.example'),
            __DIR__ . '/../../stubs/tracking/bugsnag/.env.example'
        );

        static::info('Change the .env file');
        static::appendFile(
            base_path('.env'),
            __DIR__ . '/../../stubs/tracking/bugsnag/.env.example'
        );

        // TODO: add bugsnag js
    }
}
