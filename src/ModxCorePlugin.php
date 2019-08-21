<?php

namespace RChouinard\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class ModxCorePlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
		$installer = new ModxCoreInstaller($io, $composer);
		$composer->getInstallationManager()->addInstaller($installer);
	}
}
