<?php

namespace Tests\RChouinard\Composer\unit;

use Composer\Composer;
use Composer\Config;
use Composer\Installer\InstallationManager;
use Composer\IO\NullIO;
use RChouinard\Composer\ModxCorePlugin;
use PHPUnit\Framework\TestCase;

class ModxCorePluginTest extends TestCase
{
    public function testActivate()
    {
        $composer = new Composer();
        $installationManager = new InstallationManager();
        $composer->setInstallationManager($installationManager);
        $composer->setConfig(new Config());

        $plugin = new ModxCorePlugin();
        $plugin->activate($composer, new NullIO());
        $installer = $installationManager->getInstaller('modx-core');

        $this->assertInstanceOf('\RChouinard\Composer\ModxCoreInstaller', $installer);
    }
}
