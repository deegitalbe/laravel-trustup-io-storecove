<?php
namespace Deegitalbe\LaravelTrustupIoStorecove\Tests\Unit;

use Deegitalbe\LaravelTrustupIoStorecove\Model\EIdentifiers;
use Deegitalbe\LaravelTrustupIoStorecove\Tests\TestCase;

class ExampleUnitTest extends TestCase
{
    public function test_create_an_EIdentifiers()

    {
        $peppol_identifier = new EIdentifiers([
            'id' => '0455577227',
            'scheme' => 'BE:EN',
        ]);

        $this->assertEquals('0455577227', $peppol_identifier->getId());
        $this->assertEquals('BE:EN', $peppol_identifier->getScheme());
    
    }
}