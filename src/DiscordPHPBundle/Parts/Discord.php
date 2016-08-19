<?php

namespace DiscordPHPBundle\Parts;


use DiscordPHPBundle\Components\Constants;
use DiscordPHPBundle\Components\HttpDriver;

class Discord
{
    protected $token;

    protected $http;

    public function __construct($token)
    {
        $this->token = $token;
        $this->http = new HttpDriver($token);
    }

    public function callURL($url, $method)
    {
        $httpClient = $this->http;
        $result = $httpClient->http->request(
            $method,
            $httpClient->baseURL . $url
        );

        //Casting string obligated
        $response = (string)$result->getBody();

        return json_decode($response, true);
    }

    public function getGuilds($guildID)
    {
        $url = str_replace('{guild.id}', $guildID, Constants::AllGuilds);

        dump($this->callURL($url, 'GET'));
        die;

        //TODO : construct Guild entity
    }
}