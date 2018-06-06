<?php

namespace TheLHC\GeoIP;

use Illuminate\Support\ServiceProvider;

class GeoIPServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/geo_ip.php' => config_path('geo_ip.php')
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/geo_ip.php', 'geo_ip');

        $this->app->bind('\TheLHC\GeoIP\GeoIPInterface', function($app)
        {
            return new ProIpApiRepository($app['config']->get('geo_ip'));
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
