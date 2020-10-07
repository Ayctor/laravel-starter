<?php

namespace Ayctor\LaravelStarter\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelStarter extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-starter';
    }
}
