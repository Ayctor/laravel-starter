<?php

namespace Ayctor\LaravelStarter\Presets\Base;

use Ayctor\LaravelStarter\Presets\Preset;

class Activitylog extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the activitylog preset installation');

        static::info('Run composer and artisan commands');
        shell_exec('composer require spatie/laravel-activitylog -q');
        shell_exec('php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="config" -q');
        shell_exec('php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="migrations" -q');
        shell_exec('php artisan migrate -q');
    }
}
