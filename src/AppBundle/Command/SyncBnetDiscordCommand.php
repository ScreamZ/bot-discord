<?php

namespace AppBundle\Command;

use Discord\Discord;
use Discord\Parts\User\Game;
use Discord\WebSockets\Event;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SyncBnetDiscordCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('bota')
            ->setDescription('Hello PhpStorm');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $discord = new Discord([
            'token' => 'MjE1NzkxMzM2NTIxOTkwMTQ0.Cpcz1A.soH3wQOz29xtxV6WxZBClR29Ok0',
        ]);


        $discord->on(Event::READY, function (Discord $discord) {
            echo "Bot is ready.", PHP_EOL;

            $game = $discord->factory(Game::class, [
                'name' => 'Fuck off!!',
            ]);

            $discord->updatePresence($game);


//            $discord->

//            // Listen for events here
//            $discord->on('message', function ($message) {
//                $d
//                echo "Recieved a message from {$message->author->username}: {$message->content}", PHP_EOL;
//            });
        });

        $discord->run();
    }
}
