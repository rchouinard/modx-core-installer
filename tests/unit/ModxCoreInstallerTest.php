<?php

namespace Tests\RChouinard\Composer\unit;

use Composer\Composer;
use Composer\Config;
use Composer\IO\NullIO;
use Composer\Package\Package;
use Composer\Package\RootPackage;
use RChouinard\Composer\ModxCoreInstaller;
use PHPUnit\Framework\TestCase;

class ModxCoreInstallerTest extends TestCase
{
    public function testSupports()
    {
        $installer = new ModxCoreInstaller(new NullIO(), $this->createComposer());

        $this->assertTrue($installer->supports('modx-core'));
        $this->assertFalse($installer->supports('not-modx-core'));
    }

    public function testDefaultInstallDir() {
        $installer = new ModxCoreInstaller(new NullIO(), $this->createComposer());
        $package   = new Package( 'rchouinard/test-package', '1.0.0.0', '1.0.0' );

        $this->assertEquals( 'modx', $installer->getInstallPath($package));
    }

    private function createComposer()
    {
        $composer = new Composer();
        $composer->setConfig(new Config());

        return $composer;
    }
}
