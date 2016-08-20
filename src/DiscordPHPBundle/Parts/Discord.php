<?php

namespace DiscordPHPBundle\Parts;

use DiscordPHPBundle\Components\Constants;
use DiscordPHPBundle\Components\HttpDriver;
use DiscordPHPBundle\Repositories\ChannelRepository;
use DiscordPHPBundle\Repositories\GuildRepository;
use DiscordPHPBundle\Repositories\UserRepository;

final class Discord
{
    public static $instance;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
        $httpDriver = HttpDriver::getInstance();
        $httpDriver->initDriver($token);
    }

    public function createRepository($name)
    {
        switch ($name) {
            case 'guild':
                return new GuildRepository();
                break;
            case 'user':
                return new UserRepository();
                break;
            case 'channel':
                return new ChannelRepository();
                break;
            default:
                return Constants::ERROR_FACTORY_REPOSITORY;

        }
    }
}