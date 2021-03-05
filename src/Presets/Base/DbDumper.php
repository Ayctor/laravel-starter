<?php

namespace Ayctor\LaravelStarter\Presets\Base;

use Ayctor\LaravelStarter\Presets\Preset;

class DbDumper extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the db-dumper preset installation');

        static::info('Run composer and artisan commands');
        shell_exec('composer require spatie/db-dumper --dev -q -n');

        static::info('Add the database dump command file');
        static::createOrReplaceFile(
            app_path('Console/DatabaseDump.php'),
            __DIR__ . '/../../../stubs/base/DatabaseDump.php'
        );
    }
}
