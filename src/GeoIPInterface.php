<?php

namespace TheLHC\GeoIP;

interface GeoIPInterface
{
    public function getResponse($ip);
}
