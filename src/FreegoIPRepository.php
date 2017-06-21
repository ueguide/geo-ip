<?php

namespace TheLHC\GeoIP;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class FreegoIPRepository implements GeoIPInterface
{
    /**
     * Config options to pass to guzzlehttp client
     *
     * @var Array
     */
    public $config;

    public function __construct($config)
    {
        $this->config = $config;
    }
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
            "http://freegeoip.net/json/{$ip}",
            $this->config
        );
        $json = $response->getBody()->getContents();

        return (object)json_decode($json);
    }
}
