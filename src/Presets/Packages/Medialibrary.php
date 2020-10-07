<?php

namespace Ayctor\LaravelStarter\Presets\Packages;

use Ayctor\LaravelStarter\Presets\Preset;

class Medialibrary extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the spatie media library preset installation');

        static::info('Run composer and artisan commands');
        shell_exec('composer require spatie/laravel-medialibrary -q');
        shell_exec('php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="migrations" -q');
        shell_exec('php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="config" -q');
        shell_exec('php artisan migrate -q');
    }
}
