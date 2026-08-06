<?php

namespace Deegitalbe\LaravelTrustupIoStorecove\Tests\Unit;

use Deegitalbe\LaravelTrustupIoStorecove\Model\Attachment;
use Deegitalbe\LaravelTrustupIoStorecove\Model\InvoiceLine;
use Deegitalbe\LaravelTrustupIoStorecove\Model\Transportable;
use Deegitalbe\LaravelTrustupIoStorecove\ObjectSerializer;
use Deegitalbe\LaravelTrustupIoStorecove\Tests\TestCase;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * Deserialization of received documents through the same path as
 * ReceivedDocumentsApi::getReceivedDocument(), whose returnType is Transportable.
 *
 * A rejected enum value anywhere in the payload aborts the whole document, so these
 * cases are about not losing an invoice over one unrecognised code.
 */
class ReceivedDocumentDeserializationTest extends TestCase
{
    public function test_it_deserializes_a_labour_hour_unit_code(): void
    {
        $invoice = $this->deserialize($this->payload(unitCode: 'HWE'))
            ->getDocument()
            ->getInvoice();

        $this->assertEquals('HWE', $invoice->getInvoiceLines()[0]->getQuantityUnitCode());
    }

    /**
     * @return array<string, array{0: string}>
     */
    public static function supportedMimeTypes(): array
    {
        return [
            'pdf' => [Attachment::MIME_TYPE_PDF],
            'xml' => [Attachment::MIME_TYPE_XML],
            'csv' => [Attachment::MIME_TYPE_CSV],
            'xlsx' => [Attachment::MIME_TYPE_XLSX],
        ];
    }

    #[DataProvider('supportedMimeTypes')]
    public function test_it_deserializes_every_supported_attachment_mime_type(string $mimeType): void
    {
        $invoice = $this->deserialize($this->payload(mimeType: $mimeType))
            ->getDocument()
            ->getInvoice();

        $this->assertEquals($mimeType, $invoice->getAttachments()[0]->getMimeType());
    }

    public function test_it_still_rejects_an_unknown_unit_code(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessageMatches("/'quantity_unit_code'/");

        $this->deserialize($this->payload(unitCode: 'NOT_A_CODE'));
    }

    public function test_it_still_rejects_an_unknown_mime_type(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessageMatches("/'mime_type'/");

        $this->deserialize($this->payload(mimeType: 'image/gif'));
    }

    public function test_it_keeps_accepting_a_previously_allowed_unit_code(): void
    {
        $invoice = $this->deserialize($this->payload(unitCode: InvoiceLine::QUANTITY_UNIT_CODE_HUR))
            ->getDocument()
            ->getInvoice();

        $this->assertEquals('HUR', $invoice->getInvoiceLines()[0]->getQuantityUnitCode());
    }

    private function deserialize(string $json): Transportable
    {
        return ObjectSerializer::deserialize(json_decode($json), '\\'.Transportable::class, []);
    }

    private function payload(
        string $unitCode = InvoiceLine::QUANTITY_UNIT_CODE_EA,
        string $mimeType = Attachment::MIME_TYPE_PDF,
    ): string {
        return json_encode([
            'document' => [
                'document_type' => 'invoice',
                'invoice' => [
                    'sub_type' => 'invoice',
                    'invoice_number' => 'TDD-3713',
                    'issue_date' => '2026-07-22',
                    'invoice_lines' => [[
                        'description' => 'labour',
                        'quantity' => 1,
                        'quantity_unit_code' => $unitCode,
                        'amount_excluding_tax' => 100.0,
                    ]],
                    'attachments' => [[
                        'document' => base64_encode('placeholder-bytes'),
                        'mime_type' => $mimeType,
                        'filename' => 'annex.bin',
                    ]],
                ],
            ],
        ]);
    }
}
