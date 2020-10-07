<?php

namespace Ayctor\LaravelStarter\Presets\Auth;

use Ayctor\LaravelStarter\Presets\Preset;

class Fortify extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the fortify preset installation');

        static::info('Run composer and artisan commands');
        shell_exec('composer require laravel/fortify -q');
        shell_exec('php artisan vendor:publish --provider="Laravel\\Fortify\\FortifyServiceProvider" -q');
        shell_exec('php artisan migrate -q');

        static::info('Change the fortify service provider');
        static::createOrReplaceFile(
            app_path('Providers/FortifyServiceProvider.php'),
            __DIR__ . '/../../../stubs/auth/fortify/FortifyServiceProvider.php'
        );

        static::info('Ensure that the views/auth directory exist');
        static::ensureDirectoryExists(resource_path('views/auth'));

        static::info('Add auth views');
        static::createOrReplaceDirectory(
            resource_path('views/auth'),
            __DIR__ . '/../../../stubs/base/auth/fortify/auth'
        );
    }
}
