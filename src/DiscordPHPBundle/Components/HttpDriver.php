<?php

namespace DiscordPHPBundle\Components;

use \GuzzleHttp\Client;

final class HttpDriver
{
    /** @var  HttpDriver $instance */
    static $instance;

    /** @var \GuzzleHttp\Client $http */
    public $http;

    public $baseURL = 'https://discordapp.com/api';

    public $token;

    public function __construct()
    {

    }

    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new HttpDriver();
        }

        return static::$instance;
    }

    public function initDriver($token)
    {
        $this->token = $token;
        $this->http = new Client(
            array(
                'headers' => [
                    'User-Agent' => 'DiscordBot',
                    'Authorization' => 'Bot ' . $token
                ]
            )
        );

    }

    public function callURL($url, $method)
    {
        $result = $this->http->request(
            $method,
            $this->baseURL . $url
        );

        //Casting string obligated
        $response = (string)$result->getBody();

        return json_decode($response, true);
    }
}