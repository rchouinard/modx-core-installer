<?php

namespace RChouinard\Composer;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class ModxCoreInstaller extends LibraryInstaller
{
    public function getInstallPath(PackageInterface $package)
    {
        $installationDir = false;
        $prettyName = $package->getPrettyName();

        if ($this->composer->getPackage()) {
            $topExtra = $this->composer->getPackage()->getExtra();
            if (!empty( $topExtra['modx-install-dir'])) {
                $installationDir = $topExtra['modx-install-dir'];
                if (is_array($installationDir)) {
                    $installationDir = empty($installationDir[$prettyName]) ? false : $installationDir[$prettyName];
                }
            }
        }

        $extra = $package->getExtra();
        if (!$installationDir && !empty($extra['modx-install-dir'])) {
            $installationDir = $extra['modx-install-dir'];
        }

        if (!$installationDir) {
            $installationDir = 'modx';
        }

        return $installationDir;
    }

    public function supports($packageType)
    {
        return $packageType === 'modx-core';
    }
}
