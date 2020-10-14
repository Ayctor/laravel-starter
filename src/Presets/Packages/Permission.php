<?php

namespace Ayctor\LaravelStarter\Presets\Packages;

use Ayctor\LaravelStarter\Presets\Preset;

class Permission extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the spatie permission preset installation');

        static::info('Run composer and artisan commands');
        shell_exec('composer require spatie/laravel-permission -q -n');
        shell_exec('php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" -q');
        shell_exec('php artisan migrate -q');
    }
}
