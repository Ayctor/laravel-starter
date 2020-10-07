<?php

namespace Ayctor\LaravelStarter\Presets\Test;

use Ayctor\LaravelStarter\Presets\Preset;

class Pest extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the pest preset installation');

        static::info('Run composer and artisan commands');
        shell_exec('composer require pestphp/pest --dev -q');
        shell_exec('php artisan pest:install -q');
    }
}
