<?php
namespace Deegitalbe\LaravelTrustupIoStorecove\Tests\Feature;

use Deegitalbe\LaravelTrustupIoStorecove\Api\DocumentSubmissionsApi;
use Deegitalbe\LaravelTrustupIoStorecove\Api\StorecoveApiWrapper;
use Deegitalbe\LaravelTrustupIoStorecove\ApiException;
use Deegitalbe\LaravelTrustupIoStorecove\Exceptions\StorecoveApiWrapperException;
use Deegitalbe\LaravelTrustupIoStorecove\Model\Contact;
use Deegitalbe\LaravelTrustupIoStorecove\Model\DocumentSubmission;
use Deegitalbe\LaravelTrustupIoStorecove\Tests\TestCase;
use stdClass;

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
                    'legal_entity_id' => $legalEntityId
                ],
                'submission2' => [
                    'legal_entity_id' => $legalEntityId
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

        $test = new stdClass();

        /** @var StorecoveApiWrapper */
        $wrapper = $this->app->make(StorecoveApiWrapper::class);
        /** @var DocumentSubmission */
        $submission = $this->app->make(DocumentSubmission::class);
        $submission->setLegalEntityId($expected['request']['submission1']['legal_entity_id']);
        /** @var DocumentSubmission */
        $submission2 = $this->app->make(DocumentSubmission::class);
        $submission2->setLegalEntityId($expected['request']['submission2']['legal_entity_id']);
        /** @var DocumentSubmissionsApi */
        $endpoint = $this->app->make(DocumentSubmissionsApi::class);

        try {
            $wrapper->setContext($additional)
                ->setMessage($message)
                ->setRequest([
                    'submission1' => $submission,
                    'submission2' => $submission2
                ])
                ->setApiExceptionCallback(fn (ApiException $exception) => $test->yolo = true)
                ->send(fn () => $endpoint->createDocumentSubmission($submission));
            
            // Fails on purpose since previous line is expected to throw.
            $this->assertFalse(true);
        } catch (StorecoveApiWrapperException $exception) {
            $this->assertEquals($expected, $exception->context());
        }

        $this->assertTrue($test->yolo);
    }

    public function test_wrappers_can_retrieve_response()
    {
        /** @var StorecoveApiWrapper */
        $wrapper = $this->app->make(StorecoveApiWrapper::class);

        $this->assertTrue($wrapper->send(fn () => true));
    }

    public function test_contact_set_phone_with_null()
    {
        $contact = new Contact();
        $contact->setPhone(null);
        $this->assertNull($contact->getPhone());
    }

        public function test_contact_set_phone_with_fucked_up_string()
    {
        $contact = new Contact();
        $contact->setPhone("0477/75 78 67 - 0497/322714");
        $this->assertStringContainsString("0477/75 78 67 - 0497/322714",$contact->getPhone());
    }
public function test_attachment_accepts_long_document_id()
{
    $attachment = new \Deegitalbe\LaravelTrustupIoStorecove\Model\Attachment();
    
    // A string longer than 64 characters
    $longId = str_repeat("a", 100);
    
    $attachment->setDocumentId($longId);
    
    $this->assertEquals($longId, $attachment->getDocumentId());
}


public function test_attachment_accepts_null_document_id()
{
    $attachment = new \Deegitalbe\LaravelTrustupIoStorecove\Model\Attachment();


    $attachment->setDocumentId(null);

    $this->assertEquals(null, $attachment->getDocumentId());
}

    // Address - short strings no longer throw

    public function test_address_accepts_single_char_street1()
    {
        $address = new \Deegitalbe\LaravelTrustupIoStorecove\Model\Address();
        $address->setStreet1("A");
        $this->assertEquals("A", $address->getStreet1());
    }

    public function test_address_accepts_single_char_city()
    {
        $address = new \Deegitalbe\LaravelTrustupIoStorecove\Model\Address();
        $address->setCity("A");
        $this->assertEquals("A", $address->getCity());
    }

    public function test_address_accepts_single_char_zip()
    {
        $address = new \Deegitalbe\LaravelTrustupIoStorecove\Model\Address();
        $address->setZip("A");
        $this->assertEquals("A", $address->getZip());
    }

    // Address - getValidString trims and nullifies empty/? values

    public function test_address_trims_street1()
    {
        $address = new \Deegitalbe\LaravelTrustupIoStorecove\Model\Address();
        $address->setStreet1("  Paris  ");
        $this->assertEquals("Paris", $address->getStreet1());
    }

    public function test_address_sets_empty_string_to_null()
    {
        $address = new \Deegitalbe\LaravelTrustupIoStorecove\Model\Address();
        $address->setCity("");
        $this->assertNull($address->getCity());
    }

    public function test_address_sets_whitespace_only_to_null()
    {
        $address = new \Deegitalbe\LaravelTrustupIoStorecove\Model\Address();
        $address->setZip("   ");
        $this->assertNull($address->getZip());
    }

    public function test_address_sets_question_mark_to_null()
    {
        $address = new \Deegitalbe\LaravelTrustupIoStorecove\Model\Address();
        $address->setStreet1("?");
        $this->assertNull($address->getStreet1());
    }

    // DeliveryDeliveryLocation - short id no longer throws

    public function test_delivery_location_accepts_single_char_id()
    {
        $location = new \Deegitalbe\LaravelTrustupIoStorecove\Model\DeliveryDeliveryLocation();
        $location->setId("A");
        $this->assertEquals("A", $location->getId());
    }

    // Reference - truncation instead of exception

    public function test_reference_truncates_long_document_description()
    {
        $reference = new \Deegitalbe\LaravelTrustupIoStorecove\Model\Reference();
        $longDescription = str_repeat("a", 2000);
        $reference->setDocumentDescription($longDescription);
        $this->assertEquals(1024, mb_strlen($reference->getDocumentDescription()));
    }

    public function test_reference_accepts_short_document_description()
    {
        $reference = new \Deegitalbe\LaravelTrustupIoStorecove\Model\Reference();
        $reference->setDocumentDescription("A");
        $this->assertEquals("A", $reference->getDocumentDescription());
    }

    public function test_reference_accepts_null_document_description()
    {
        $reference = new \Deegitalbe\LaravelTrustupIoStorecove\Model\Reference();
        $reference->setDocumentDescription(null);
        $this->assertNull($reference->getDocumentDescription());
    }
}