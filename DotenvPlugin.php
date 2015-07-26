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
        $dotenv = new Dotenv(dirname(__DIR__));
        $dotenv->load();
    }

    public static function getSubscribedEvents()
    {
        return array();
    }
}
