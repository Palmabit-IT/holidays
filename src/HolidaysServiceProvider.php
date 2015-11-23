<?php

namespace Palmabit\Holidays;

use Illuminate\Support\ServiceProvider;

class HolidaysServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        // Nothing.
        $this->app->singleton('Palmabit\Holidays\Holidays', function ($app) {
            return new \Palmabit\Holidays\Holidays();
        });
    }

}
