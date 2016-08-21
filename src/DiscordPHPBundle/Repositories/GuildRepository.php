<?php

namespace DiscordPHPBundle\Repositories;

use DiscordPHPBundle\Components\APICall;
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

    public function getGuild($guildID)
    {
        $apiCall = new APICall(Constants::GetGuild);
        $apiCall->replaceArgs(array('{guild.id}' => $guildID));

        $jsonResult = $this->httpDriver->callURL($apiCall);

        return new Guild($jsonResult);
    }

    public function modifyGuild($guildID, Guild $guild)
    {
        $apiCall = new APICall(Constants::ModifyGuild);
        $apiCall->replaceArgs(array('{guild.id}' => $guildID));

        $updatedFields = array();

        foreach ($apiCall->getAuthorizedFields() as $field) {
            if (property_exists($guild, $field)) {
                $updatedFields[$field] = $guild->$field;
            }
        }

        $jsonResult = $this->httpDriver->callURL($apiCall, $updatedFields);

        //TODO build guild
        return $jsonResult;
    }

    public function getGuildChannels($guildID)
    {
        $apiCall = new APICall(Constants::GetGuildChannels);
        $apiCall->replaceArgs(array('{guild.id}', $guildID));

        $jsonResult = $this->httpDriver->callURL($apiCall);

        //TODO build guild channels
        return $jsonResult;
    }

    public function deleteGuild($guildID)
    {
        $apiCall = new APICall(Constants::DeleteGuild);
        $apiCall->replaceArgs(array('{guild.id}', $guildID));

        $jsonResult = $this->httpDriver->callURL($apiCall);

        return $jsonResult;
    }

}