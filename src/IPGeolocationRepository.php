<?php

namespace TheLHC\GeoIP;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class IPGeolocationRepository implements GeoIPInterface
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
     * Get response from pro.ip-api.com
     *
     * @param  string $ip
     * @return object
     */
    public function getResponse($ip)
    {
        $client = new Client();
        $response = $client->request(
            "GET",
            "https://api.ipgeolocation.io/ipgeo",
            [
                'query' => [
                    'ip' => $ip,
                    'apiKey' => $this->config['api_key'],
                    'excludes' => 'continent_code,currency,time_zone'
                ]
            ]
        );
        $body = json_decode($response->getBody()->getContents());

        return (object) [
            'city'          => $body->city,
            //'region_code'   => $body->region,
            'region_name'   => $body->state_prov,
            'country'       => $body->country_name,
            'country_code'  => $body->country_code2,
            'latitude'      => (float)$body->latitude,
            'longitude'     => (float)$body->longitude,
        ];
    }
}
