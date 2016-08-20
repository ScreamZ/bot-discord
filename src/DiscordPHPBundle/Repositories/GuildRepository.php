<?php

namespace DiscordPHPBundle\Repositories;

use DiscordPHPBundle\Parts\Entities\Guild;
use DiscordPHPBundle\Components\Constants;
use DiscordPHPBundle\Components\HttpDriver;

class GuildRepository
{
    private $httpDriver;

    public function __construct()
    {
        $this->httpDriver = HttpDriver::getInstance();
    }


    public function getGuilds($guildID)
    {
        $url = str_replace('{guild.id}', $guildID, Constants::AllGuilds);

        $jsonResult = $this->httpDriver->callURL($url, 'GET');

        return new Guild($jsonResult['id'], $jsonResult['name'], $jsonResult['roles']);
        die;

        //TODO : construct Guild entity
    }

}