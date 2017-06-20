<?php

namespace TheLHC\GeoIP;

use Illuminate\Support\ServiceProvider;

class GeoIPServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->bind('\TheLHC\GeoIP\GeoIPInterface', function($app)
        {
            return new FreegoIPRepository;
        });

        $this->app->singleton('geo_ip', function ($app) {
            return new GeoIP(
                $app->make('\TheLHC\GeoIP\GeoIPInterface')
            );
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'geo_ip',
        ];
    }

}
