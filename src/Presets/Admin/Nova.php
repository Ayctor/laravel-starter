<?php

namespace Ayctor\LaravelStarter\Presets\Admin;

use Ayctor\LaravelStarter\Presets\Preset;

class Nova extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the nova preset installation');

        static::info('Add repository url in composer.json');
        static::mergeComposerValue('repositories', [
            'laravel/nova' => [
                'type' => 'composer',
                'url' => 'https://nova.laravel.com',
            ],
        ]);
        static::mergeComposerValue('require', [
            'laravel/nova' => '~3.0',
        ]);

        static::info('Run composer update and artisan commands');
        shell_exec('composer update --q');
        shell_exec('php artisan nova:install -q');
        shell_exec('php artisan migrate -q');

        static::info('Change the nova path in the configuration file');
        static::replaceConfigValue(
            config_path('nova.php'),
            "'path' => '/nova'",
            "'path' => '/tools/nova'"
        );

        static::info('Change the nova currency in the configuration file');
        static::replaceConfigValue(
            config_path('nova.php'),
            "'currency' => 'USD'",
            "'currency' => 'EUR'"
        );

        static::info('Add the activitylog resourcce file');
        static::createOrReplaceFile(
            app_path('Nova/ActivityLog.php'),
            __DIR__ . '/../../stubs/admin/nova/ActivityLog.php'
        );
    }
}
