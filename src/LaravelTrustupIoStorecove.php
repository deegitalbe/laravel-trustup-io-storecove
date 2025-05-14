<?php
namespace Deegitalbe\LaravelTrustupIoStorecove;

use Deegitalbe\LaravelTrustupIoStorecove\Contracts\LaravelTrustupIoStorecoveContract;
use Henrotaym\LaravelPackageVersioning\Services\Versioning\VersionablePackage;

class LaravelTrustupIoStorecove extends VersionablePackage implements LaravelTrustupIoStorecoveContract
{
    public static function prefix(): string
    {
        return "laravel-trustup-io-package-boilerplate";
    }
}