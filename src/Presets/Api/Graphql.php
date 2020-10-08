<?php

namespace Ayctor\LaravelStarter\Presets\Api;

use Ayctor\LaravelStarter\Presets\Preset;

class Graphql extends Preset
{
    /**
     * Take care of the preset installation
     *
     * @return void
     */
    public static function install(): void
    {
        static::info('');
        static::info('Starts the graphql preset installation');

        static::info('Run composer and artisan commands');
        //shell_exec('composer require nuwave/lighthouse');
        shell_exec('composer require mll-lab/laravel-graphql-playground -q');
        //shell_exec('php artisan vendor:publish --tag=lighthouse-schema -q');
        //shell_exec('php artisan lighthouse:ide-helper -q');
        //shell_exec('php artisan vendor:publish --tag=lighthouse-config -q');
        shell_exec('php artisan vendor:publish --tag=graphql-playground-config -q');

        //static::info('Change the graphql path in the configuration file');
        //static::replaceConfigValue(
        //    config_path('lighthouse.php'),
        //    "'uri' => '/graphql'",
        //    "'uri' => '/api/graphql'"
        //);

        static::info('Change the graphql playground path in the configuration file');
        static::replaceConfigValue(
            config_path('graphql-playground.php'),
            "'uri' => '/graphql-playground'",
            "'uri' => '/tools/graphql'"
        );

        static::info('Change the graphql playground endpoint path in the configuration file');
        static::replaceConfigValue(
            config_path('graphql-playground.php'),
            "'endpoint' => '/graphql'",
            "'endpoint' => '/api/graphql'"
        );
    }
}
