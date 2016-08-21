<?php

namespace DiscordPHPBundle\Components;


class Constants
{
    //Errors
    const ERROR_FACTORY_REPOSITORY = 1;

    //URLs
    const GetGuild = array(
        'url' => '/guilds/{guild.id}',
        'method' => 'GET',
        'params' => array()
    );

    const ModifyGuild = array(
        'url' => '/guilds/{guild.id}',
        'method' => 'PATCH',
        'params' => array(
            'authorized_fields' => array(
                'name', 'region', 'verification_level', 'afk_channel_id', 'afk_timeout', 'icon', 'owner_id', 'splash'
            )
        )
    );

    const GetGuildChannels = array(
        'url' => '/guilds/{guild.id}/channels',
        'method' => 'GET',
        'params' => array()
    );

    const DeleteGuild = array(
        'url' => '/guild/{guild.id}',
        'method' => 'DELETE',
        'params' => array()
    );
}