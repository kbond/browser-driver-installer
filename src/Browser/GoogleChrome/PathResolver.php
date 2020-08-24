<?php

declare(strict_types=1);

namespace DBrekelmans\BrowserDriverInstaller\Browser\GoogleChrome;

use DBrekelmans\BrowserDriverInstaller\Browser\BrowserName;
use DBrekelmans\BrowserDriverInstaller\Exception\NotImplemented;
use DBrekelmans\BrowserDriverInstaller\OperatingSystem\OperatingSystem;
use DBrekelmans\BrowserDriverInstaller\Browser\PathResolver as PathResolverInterface;

class PathResolver implements PathResolverInterface
{
    /**
     * @throws NotImplemented
     */
    public function from(OperatingSystem $operatingSystem) : string
    {
        if ($operatingSystem->equals(OperatingSystem::LINUX())) {
            // TODO: command -v google-chrome
            return 'google-chrome';
        }

        if ($operatingSystem->equals(OperatingSystem::MACOS())) {
            // TODO: check if file exists
            return '/Applications/Google\ Chrome.app';
        }

        if ($operatingSystem->equals(OperatingSystem::WINDOWS())) {
            // TODO: (Get-Item (Get-ItemProperty 'HKLM:\SOFTWARE\Microsoft\Windows\CurrentVersion\App Paths\chrome.exe').'(Default)').VersionInfo
            return 'C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe';
        }

        throw NotImplemented::feature(sprintf('Resolving %s path for %s', $this->supportedBrowser()->getValue(), $operatingSystem->getValue()));
    }

    public function supportedBrowser() : BrowserName
    {
        return BrowserName::GOOGLE_CHROME();
    }
}