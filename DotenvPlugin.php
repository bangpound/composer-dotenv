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
        // Merge plugin's settings into extras.
        $extra = array_replace([
            'dotenv' => ['path' => getcwd(), 'file' => '.env'],
        ], $composer->getPackage()->getExtra());
        $options = $extra['dotenv'];

        // Error: Path does not exist.
        if (!realpath($options['path'])) {
            throw new \InvalidArgumentException('Missing path');
        }

        try {
            $dotenv = new Dotenv($options['path'], $options['file']);
            $dotenv->load();
        } catch (\InvalidArgumentException $e) {
        }
    }
}
