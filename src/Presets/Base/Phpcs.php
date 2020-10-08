<?php

namespace Ayctor\LaravelStarter\Presets\Base;

use Ayctor\LaravelStarter\Presets\Preset;

class Phpcs extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the phpcs preset installation');

        static::info('Run composer and artisan commands');
        shell_exec('composer require friendsofphp/php-cs-fixer --dev -q');

        static::info('Add the php_cs.dist file');
        static::createOrReplaceFile(
            base_path('php_cs.dist'),
            __DIR__ . '/../../stubs/base/php_cs.dist'
        );
    }
}
