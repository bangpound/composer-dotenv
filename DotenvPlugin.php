<?php

namespace Bangpound\Composer;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Dotenv\Dotenv;

class DotenvPlugin implements PluginInterface, EventSubscriberInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        try {
            $dotenv = new Dotenv(getcwd());
            $dotenv->load();
        }
        catch (\InvalidArgumentException $e) {
        }
    }

    public static function getSubscribedEvents()
    {
        return array();
    }
}
