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

        $guildRepository = $discord->createRepository('guild');

        try {
            $guild = $guildRepository->getGuild(216152652164235264);

            dump($guild);

            $guild->setName('test');
            dump($guild);

            $guild = $guildRepository->modifyGuild($guild->getId(), $guild);
            dump($guild);

        } catch (\Exception $e) {
            dump($e->getMessage());
        }


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
