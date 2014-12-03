<?php

namespace AppBundle\Command\Test;

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version1X;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SocketIOCommand extends Command
{
    public function configure()
    {
        $this
            ->setName('test:socket:publish');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $client = new Client(new Version1X('http://localhost:8080'));
        $client->initialize();
        $client->emit('message', ['test from cmd']);
        $client->close();
    }
}