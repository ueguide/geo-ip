<?php

namespace TheLHC\GeoIP;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class GeoIP
{
    protected $repo;

    public function __construct(GeoIPInterface $repo)
    {
        $this->repo = $repo;
    }

    public function host($ip)
    {
        return $this->repo->getResponse($ip);
    }
}
