<?php
namespace Deegitalbe\LaravelTrustupIoStorecove\Tests\Unit;

use Deegitalbe\LaravelTrustupIoStorecove\Configuration;
use Deegitalbe\LaravelTrustupIoStorecove\Model\EIdentifiers;
use Deegitalbe\LaravelTrustupIoStorecove\Tests\TestCase;

class ExampleUnitTest extends TestCase
{
    public function test_create_an_EIdentifiers()

    {
        // $config = Configuration::setDefaultConfiguration(
        //     new Configuration(
        //         'https://api.storecove.com',
        //         'test',
        //         'test'
        //     )
        // );
        // $apiInstance = new LegalEntitiesApi(
        //     // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        //     // This is optional, `GuzzleHttp\Client` will be used as default.
        //     new \GuzzleHttp\Client(),
        //     $config
        // );
        $peppol_identifier = new EIdentifiers([
            'id' => '0455577227',
            'scheme' => 'BE:EN',
        ]);

        $this->assertEquals('0455577227', $peppol_identifier->getId());
        $this->assertEquals('BE:EN', $peppol_identifier->getScheme());
    
    }
}