<?php

namespace TheLHC\GeoIP\Tests;

use Dotenv\Dotenv;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            'TheLHC\GeoIP\GeoIPServiceProvider'
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'GeoIP' => 'TheLHC\GeoIP\Facades\GeoIP'
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $dotenv = Dotenv::create(__DIR__);
        $dotenv->load();

        $app['config']->set('geo_ip.api_key', env('GEO_API_KEY'));
    }
}
