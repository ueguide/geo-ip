<?php

use TheLHC\GeoIP\Tests\TestCase;

class GeoIPTest extends TestCase
{
    public function testGeoIP()
    {
        $location = GeoIP::host('76.178.214.130');
        $this->assertEquals(true, is_object($location));
        $this->assertEquals('Scarborough', $location->city);
        //$this->assertEquals('ME', $location->region_code);
        $this->assertEquals('US', $location->country_code);
        $this->assertEquals(43.60830, $location->latitude);
        $this->assertEquals(-70.39760, $location->longitude);
    }
}
