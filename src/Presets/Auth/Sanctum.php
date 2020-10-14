<?php

namespace Ayctor\LaravelStarter\Presets\Auth;

use Ayctor\LaravelStarter\Presets\Preset;

class Sanctum extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the sanctum preset installation');

        static::info('Run composer and artisan commands');
        shell_exec('composer require laravel/sanctum -q -n');
        shell_exec('php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider" -q');
        shell_exec('php artisan migrate -q');
    }
}
