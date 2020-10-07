<?php

namespace Ayctor\LaravelStarter\Presets\Backup;

use Ayctor\LaravelStarter\Presets\Preset;
use Illuminate\Support\Str;

class Spatiebackup extends Preset
{
    protected $default = true;

    protected $description = 'Spatie ';
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the spatie backup preset installation');

        static::info('Run composer and artisan commands');
        shell_exec('composer require spatie/laravel-backup -q');
        shell_exec('php artisan vendor:publish --provider="Spatie\Backup\BackupServiceProvider" -q');

        static::info('Change the configuration file');
        static::createOrReplaceFile(
            config_path('backup.php'),
            __DIR__ . '/../../../stubs/backup/spatiebackup/backup.php'
        );
    }
}
