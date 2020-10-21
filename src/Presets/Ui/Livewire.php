<?php

namespace Ayctor\LaravelStarter\Presets\Ui;

use Ayctor\LaravelStarter\Presets\Preset;

class Livewire extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the livewire preset installation');

        static::info('Install the dependencies');
        shell_exec('composer require livewire/livewire -q -n');
        shell_exec('php artisan livewire:publish -q');

        static::info('Add the app.blade.php layouts file');
        static::createOrReplaceFile(
            resource_path('views/layouts/app.blade.php'),
            __DIR__ . '/../../../stubs/ui/livewire/layouts/app.blade.php'
        );
    }
}
