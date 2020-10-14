<?php

namespace Ayctor\LaravelStarter\Presets\Base;

use Ayctor\LaravelStarter\Presets\Preset;

class Larastan extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the larastan preset installation');

        static::info('Run composer and artisan commands');
        shell_exec('composer require nunomaduro/larastan --dev -q -n');

        static::info('Add the phpstan.neon file');
        static::createOrReplaceFile(
            base_path('phpstan.neon'),
            __DIR__ . '/../../../stubs/base/phpstan.neon'
        );
    }
}
