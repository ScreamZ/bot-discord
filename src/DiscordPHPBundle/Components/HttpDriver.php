<?php

namespace DiscordPHPBundle\Components;

use \GuzzleHttp\Client;

class HttpDriver
{
    /** @var \GuzzleHttp\Client $http */
    public $http;

    public $baseURL = 'https://discordapp.com/api';

    public function __construct($token)
    {
        $this->http = new Client(
            array(
                'headers' => [
                    'User-Agent' => 'DiscordBot',
                    'Authorization' => 'Bot ' . $token
                ]
            )
        );
    }
}