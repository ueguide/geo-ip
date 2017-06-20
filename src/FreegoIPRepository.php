<?php

namespace TheLHC\GeoIP;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class FreegoIPRepository implements GeoIPInterface
{
    /**
     * Get response from freegoip.net
     *
     * @param  String $ip
     * @return stdClass
     */
    public function getResponse($ip)
    {
        $client = new Client();
        $response = $client->request(
            "GET",
            "http://freegeoip.net/json/{$ip}"
        );
        $json = $response->getBody()->getContents();

        return (object)json_decode($json);
    }
}
