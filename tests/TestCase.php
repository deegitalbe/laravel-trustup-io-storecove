<?php
namespace Deegitalbe\LaravelTrustupIoStorecove\Tests;

use Deegitalbe\LaravelTrustupIoStorecove\LaravelTrustupIoStorecove;
use Henrotaym\LaravelPackageVersioning\Testing\VersionablePackageTestCase;
use Deegitalbe\LaravelTrustupIoStorecove\Providers\LaravelTrustupIoStorecoveServiceProvider;

class TestCase extends VersionablePackageTestCase
{
    public static function getPackageClass(): string
    {
        return LaravelTrustupIoStorecove::class;
    }

    public function getEnvironmentSetUp($app)
    {
        $this->loadMigrations();
    }
    
    public function getServiceProviders(): array
    {
        return [
            LaravelTrustupIoStorecoveServiceProvider::class
        ];
    }

    protected function loadMigrations()
    {
        foreach($this->getMigrations() as $migration):
            app()->make($migration)->up();
        endforeach;
    }

    /**
     * Define your migrations files here.
     * 
     * @return array<int, string> 
     */
    protected function getMigrations(): array
    {
        return [];
    }
}