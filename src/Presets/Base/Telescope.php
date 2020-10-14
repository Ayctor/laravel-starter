<?php

namespace Ayctor\LaravelStarter\Presets\Base;

use Ayctor\LaravelStarter\Presets\Preset;

class Telescope extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the telescope preset installation');

        static::info('Run composer and artisan commands');
        shell_exec('composer require laravel/telescope -q -n');
        shell_exec('php artisan telescope:install -q');
        shell_exec('php artisan migrate -q');

        static::info('Change the telescope path');
        static::replaceFileValue(
            config_path('telescope.php'),
            "'path' => env('TELESCOPE_PATH', 'telescope')",
            "'path' => env('TELESCOPE_PATH', 'tools/telescope')"
        );

        static::info('Change the telescope service provider');
        static::createOrReplaceFile(
            app_path('Providers/AppServiceProvider.php'),
            __DIR__ . '/../../../stubs/base/AppServiceProvider.php'
        );

        static::info('Ensure that the console directory exist');
        static::ensureDirectoryExists(app_path('Console'));

        static::info('Change the kernel console file');
        static::createOrReplaceFile(
            app_path('Console/Kernel.php'),
            __DIR__ . '/../../../stubs/base/Kernel.php'
        );
    }
}
