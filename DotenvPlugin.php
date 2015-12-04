<?php

namespace Bangpound\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Dotenv\Dotenv;

class DotenvPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        try {
            $dotenv = new Dotenv(getcwd());
            $dotenv->load();
        } catch (\InvalidArgumentException $e) {
        }
    }
}
