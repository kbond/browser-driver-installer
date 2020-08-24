<?php
declare(strict_types=1);

namespace DBrekelmans\BrowserDriverInstaller\Browser;


use DBrekelmans\BrowserDriverInstaller\OperatingSystem\OperatingSystem;

interface PathResolver
{
    public function fromOperatingSystem(OperatingSystem $operatingSystem): string;
}