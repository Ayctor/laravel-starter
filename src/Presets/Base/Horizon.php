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

        static::info('Change the horizon domain');
        static::replaceFileValue(
            config_path('horizon.php'),
            "'domain' => null'",
            "'domain' => env('HORIZON_DOMAIN', null)"
        );

        static::info('Change the horizon path');
        static::replaceFileValue(
            config_path('horizon.php'),
            "'path' => 'horizon'",
            "'path' => env('HORIZON_PATH', 'tools/horizon')"
        );
    }
}
