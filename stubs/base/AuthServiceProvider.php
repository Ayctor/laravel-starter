<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // Example::class => ExamplePolicy::class,
    ];

    /**
     * The gates mappings for the application.
     *
     * @var array
     */
    protected $gates = [
        // 'create-example' => [ExampleGate::class, 'create'],
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();
        $this->registerGates();
    }

    /**
     * Register the application's gates.
     *
     * @return void
     */
    public function registerGates(): void
    {
        foreach ($this->gates as $key => $value) {
            Gate::define($key, $value);
        }
    }
}
