<?php

namespace TheLHC\GeoIP;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ProIpApiRepository implements GeoIPInterface
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
            "http://pro.ip-api.com/json/{$ip}?key={$this->config['api_key']}",
            $this->config
        );
        $body = json_decode($response->getBody()->getContents());

        return (object) [
            'city'          => $body->city,
            'region_code'   => $body->region,
            'region_name'   => $body->regionName,
            'country'       => $body->country,
            'country_code'  => $body->countryCode,
            'latitude'      => $body->lat,
            'longitude'     => $body->lon,
        ];
    }
}
