<?php

namespace Ayctor\LaravelStarter\Presets\Base;

use Ayctor\LaravelStarter\Presets\Preset;

class Debugbar extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the debugbar preset installation');

        static::info('Run composer and artisan commands');
        shell_exec('composer require barryvdh/laravel-debugbar --dev -q');
        shell_exec('php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider" -q');
    }
}
