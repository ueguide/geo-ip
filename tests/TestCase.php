<?php

namespace TheLHC\GeoIP\Tests;

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
}
