<?php
namespace Deegitalbe\LaravelTrustupIoStorecove\Facades;

use Deegitalbe\LaravelTrustupIoStorecove\LaravelTrustupIoStorecove;
use Henrotaym\LaravelPackageVersioning\Facades\Abstracts\VersionablePackageFacade;

class LaravelTrustupIoStorecoveFacade extends VersionablePackageFacade
{
    public static function getPackageClass(): string
    {
        return LaravelTrustupIoStorecove::class;
    }
}