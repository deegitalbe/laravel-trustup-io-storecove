<?php
namespace Deegitalbe\LaravelTrustupIoStorecove\Tests\Feature;

use Deegitalbe\LaravelTrustupIoStorecove\Api\DocumentSubmissionsApi;
use Deegitalbe\LaravelTrustupIoStorecove\Api\StorecoveApiWrapper;
use Deegitalbe\LaravelTrustupIoStorecove\ApiException;
use Deegitalbe\LaravelTrustupIoStorecove\Exceptions\StorecoveApiWrapperException;
use Deegitalbe\LaravelTrustupIoStorecove\Model\Address;
use Deegitalbe\LaravelTrustupIoStorecove\Model\Attachment;
use Deegitalbe\LaravelTrustupIoStorecove\Model\Contact;
use Deegitalbe\LaravelTrustupIoStorecove\Model\DeliveryDeliveryLocation;
use Deegitalbe\LaravelTrustupIoStorecove\Model\DocumentSubmission;
use Deegitalbe\LaravelTrustupIoStorecove\Model\Reference;
use Deegitalbe\LaravelTrustupIoStorecove\Tests\TestCase;
use stdClass;

class ExampleFeatureTest extends TestCase
{
    // ==================== StorecoveApiWrapper ====================

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

    // ==================== Contact - phone ====================

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
        $this->assertStringContainsString("0477/75 78 67 - 0497/322714", $contact->getPhone());
    }

    // ==================== Attachment - documentId ====================

    public function test_attachment_accepts_long_document_id()
    {
        $attachment = new Attachment();
        $longId = str_repeat("a", 100);
        $attachment->setDocumentId($longId);
        $this->assertEquals($longId, $attachment->getDocumentId());
    }

    public function test_attachment_accepts_null_document_id()
    {
        $attachment = new Attachment();
        $attachment->setDocumentId(null);
        $this->assertEquals(null, $attachment->getDocumentId());
    }

    // ==================== Address - street1 ====================

    public function test_address_street1_accepts_single_char()
    {
        $address = new Address();
        $address->setStreet1("A");
        $this->assertEquals("A", $address->getStreet1());
    }

    public function test_address_street1_trims_whitespace()
    {
        $address = new Address();
        $address->setStreet1("  Paris  ");
        $this->assertEquals("Paris", $address->getStreet1());
    }

    public function test_address_street1_sets_empty_string_to_null()
    {
        $address = new Address();
        $address->setStreet1("");
        $this->assertNull($address->getStreet1());
    }

    public function test_address_street1_sets_whitespace_only_to_null()
    {
        $address = new Address();
        $address->setStreet1("   ");
        $this->assertNull($address->getStreet1());
    }

    public function test_address_street1_sets_question_mark_to_null()
    {
        $address = new Address();
        $address->setStreet1("?");
        $this->assertNull($address->getStreet1());
    }

    // ==================== Address - city ====================

    public function test_address_city_accepts_single_char()
    {
        $address = new Address();
        $address->setCity("A");
        $this->assertEquals("A", $address->getCity());
    }

    public function test_address_city_sets_empty_string_to_null()
    {
        $address = new Address();
        $address->setCity("");
        $this->assertNull($address->getCity());
    }

    // ==================== Address - zip ====================

    public function test_address_zip_accepts_single_char()
    {
        $address = new Address();
        $address->setZip("A");
        $this->assertEquals("A", $address->getZip());
    }

    public function test_address_zip_sets_whitespace_only_to_null()
    {
        $address = new Address();
        $address->setZip("   ");
        $this->assertNull($address->getZip());
    }

    // ==================== DeliveryDeliveryLocation ====================

    public function test_delivery_location_accepts_single_char_id()
    {
        $location = new DeliveryDeliveryLocation();
        $location->setId("A");
        $this->assertEquals("A", $location->getId());
    }

    // ==================== Reference - documentDescription ====================

    public function test_reference_truncates_long_document_description()
    {
        $reference = new Reference();
        $longDescription = str_repeat("a", 2000);
        $reference->setDocumentDescription($longDescription);
        $this->assertEquals(1024, mb_strlen($reference->getDocumentDescription()));
    }

    public function test_reference_accepts_short_document_description()
    {
        $reference = new Reference();
        $reference->setDocumentDescription("A");
        $this->assertEquals("A", $reference->getDocumentDescription());
    }

    public function test_reference_accepts_null_document_description()
    {
        $reference = new Reference();
        $reference->setDocumentDescription(null);
        $this->assertNull($reference->getDocumentDescription());
    }
}
