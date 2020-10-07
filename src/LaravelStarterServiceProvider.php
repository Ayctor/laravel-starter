<?php

namespace Ayctor\LaravelStarter;

use Ayctor\LaravelStarter\Commands\InstallPreset;
use Illuminate\Support\ServiceProvider;

class LaravelStarterServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallPreset::class,
            ]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['laravel-starter'];
    }
}
