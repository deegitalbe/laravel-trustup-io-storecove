<?php
namespace Deegitalbe\LaravelTrustupIoStorecove\Providers;

use Deegitalbe\LaravelTrustupIoStorecove\LaravelTrustupIoStorecove;
use Henrotaym\LaravelPackageVersioning\Providers\Abstracts\VersionablePackageServiceProvider;

class LaravelTrustupIoStorecoveServiceProvider extends VersionablePackageServiceProvider
{
    public static function getPackageClass(): string
    {
        return LaravelTrustupIoStorecove::class;
    }

    protected function addToRegister(): void
    {
        //
    }

    protected function addToBoot(): void
    {
        //
    }
}