<?php

namespace Ayctor\LaravelStarter\Tests;

use Ayctor\LaravelStarter\LaravelStarterServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelStarterServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // If you need to add something early in the
        // application bootstrapping process, you could
        // use the getEnvironmentSetUp() method
    }
}
