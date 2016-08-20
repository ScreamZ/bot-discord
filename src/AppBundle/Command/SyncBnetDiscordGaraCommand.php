<?php

namespace AppBundle\Command;

use Discord\Parts\Channel\Message;
use DiscordPHPBundle\Parts\Discord;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SyncBnetDiscordGaraCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('botb')
            ->setDescription('Hello PhpStorm');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $token = 'MjE2MTQ3NTIzNTA3NTg1MDI2.Cph6hg.Lc8rvDQJKZIV1pIFmRGMCLzSAUY';

        $discord = new Discord($token);

        $discord->getGuilds(216152652164235264);

        die;
        $discord = new Discord([
            'token' => $token,
        ]);

        $discord->on('ready', function(Discord $discord) {
           dump($discord->guilds->first());
        });

        $discord->on('message', function (Message $message) {
            echo "Recieved a message from {$message->author->username}: {$message->content}", PHP_EOL;

            $message->author->sendMessage('bonjour');

        });



        $discord->run();
    }
}
