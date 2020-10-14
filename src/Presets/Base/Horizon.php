<?php

namespace Ayctor\LaravelStarter\Presets\Base;

use Ayctor\LaravelStarter\Presets\Preset;

class Horizon extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the horizon preset installation');

        static::info('Run composer and artisan commands');
        shell_exec('composer require laravel/horizon -q -n');
        shell_exec('php artisan horizon:install -q');
    }
}
