<?php
namespace Deegitalbe\LaravelTrustupIoStorecove\Tests\Feature;

use Deegitalbe\LaravelTrustupIoStorecove\Api\DocumentSubmissionsApi;
use Deegitalbe\LaravelTrustupIoStorecove\Api\StorecoveApiWrapper;
use Deegitalbe\LaravelTrustupIoStorecove\Exceptions\StorecoveApiWrapperException;
use Deegitalbe\LaravelTrustupIoStorecove\Model\DocumentSubmission;
use Deegitalbe\LaravelTrustupIoStorecove\Tests\TestCase;

class ExampleFeatureTest extends TestCase
{
    public function test_wrapper_can_catch_storecove_api_error_and_format_properly()
    {
        $additional = ['test' => 'yup'];
        $legalEntityId = 1;
        $message = "random";
        $expected = [
            'request' => [
                'submission1' => [
                    'legalEntityId' => $legalEntityId
                ],
                'submission2' => [
                    'legalEntityId' => $legalEntityId
                ]
            ],
            'exception' => [
                'code' => 403,
                'message' => "[403] Client error: `POST https://api.storecove.com/api/v2/document_submissions` resulted in a `403 Forbidden` response:\n{\"errors\":[{\"source\":\"generic\",\"details\":\"Not Authorized\"}]}\n"
            ],
            "response" => [
                "errors" => [
                    [
                        "source" => "generic",
                        "details" => "Not Authorized"
                    ]
                ]
            ],
            ...$additional
        ];

        /** @var StorecoveApiWrapper */
        $wrapper = $this->app->make(StorecoveApiWrapper::class);
        /** @var DocumentSubmission */
        $submission = $this->app->make(DocumentSubmission::class);
        $submission->setLegalEntityId($expected['request']['submission1']['legalEntityId']);
        /** @var DocumentSubmission */
        $submission2 = $this->app->make(DocumentSubmission::class);
        $submission2->setLegalEntityId($expected['request']['submission2']['legalEntityId']);
        /** @var DocumentSubmissionsApi */
        $endpoint = $this->app->make(DocumentSubmissionsApi::class);

        try {
            $wrapper->setContext($additional)
                ->setMessage($message)
                ->setRequest([
                    'submission1' => $submission,
                    'submission2' => $submission2
                ])
                ->send(fn () => $endpoint->createDocumentSubmission($submission));
            
            // Fails on purpose since previous line is expected to throw.
            $this->assertFalse(true);
        } catch (StorecoveApiWrapperException $exception) {
            $this->assertEquals($expected, $exception->context());
        }
    }

    public function test_wrappers_can_retrieve_response()
    {
        /** @var StorecoveApiWrapper */
        $wrapper = $this->app->make(StorecoveApiWrapper::class);

        $this->assertTrue($wrapper->send(fn () => true));
    }
}