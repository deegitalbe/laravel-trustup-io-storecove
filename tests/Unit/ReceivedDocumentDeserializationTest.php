<?php

namespace Deegitalbe\LaravelTrustupIoStorecove\Tests\Unit;

use Deegitalbe\LaravelTrustupIoStorecove\Model\Attachment;
use Deegitalbe\LaravelTrustupIoStorecove\Model\Invoice;
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

    /**
     * Values observed on real inbound documents that the generated allow-list rejected,
     * each stranding every document carrying it. Kept as literals: they are what the
     * network actually sends, not constants we define.
     *
     * @return array<string, array{0: string}>
     */
    public static function unlistedSubTypes(): array
    {
        return [
            'debit note related to financial adjustments' => ['debit_note_related_to_financial_adjustments'],
            'credit note related to financial adjustments' => ['credit_note_related_to_financial_adjustments'],
            'factored invoice' => ['factored_invoice'],
            'factored credit note' => ['factored_credit_note'],
            'insurers invoice' => ['insurers_invoice'],
            'final construction invoice' => ['final_construction_invoice'],
            'metered services invoice' => ['metered_services_invoice'],
            'commission note' => ['commission_note'],
            'tax invoice' => ['tax_invoice'],
        ];
    }

    #[DataProvider('unlistedSubTypes')]
    public function test_it_deserializes_a_sub_type_outside_the_known_list(string $subType): void
    {
        $invoice = $this->deserialize($this->payload(subType: $subType))
            ->getDocument()
            ->getInvoice();

        $this->assertEquals($subType, $invoice->getSubType());
    }

    public function test_it_deserializes_a_sub_type_nobody_has_seen_yet(): void
    {
        $invoice = $this->deserialize($this->payload(subType: 'some_future_uncl1001_type'))
            ->getDocument()
            ->getInvoice();

        $this->assertEquals('some_future_uncl1001_type', $invoice->getSubType());
    }

    public function test_it_keeps_accepting_a_previously_allowed_sub_type(): void
    {
        $invoice = $this->deserialize($this->payload(subType: Invoice::SUB_TYPE_SELF_BILLED_INVOICE))
            ->getDocument()
            ->getInvoice();

        $this->assertEquals('self_billed_invoice', $invoice->getSubType());
    }

    public function test_it_reports_no_validation_error_for_an_unlisted_sub_type(): void
    {
        $invoice = $this->deserialize($this->payload(subType: 'factored_invoice'))
            ->getDocument()
            ->getInvoice();

        $this->assertNotContains(
            'sub_type',
            array_map(fn (string $error): string => $error, $invoice->listInvalidProperties())
        );
    }

    private function deserialize(string $json): Transportable
    {
        return ObjectSerializer::deserialize(json_decode($json), '\\'.Transportable::class, []);
    }

    private function payload(
        string $unitCode = InvoiceLine::QUANTITY_UNIT_CODE_EA,
        string $mimeType = Attachment::MIME_TYPE_PDF,
        string $subType = 'invoice',
    ): string {
        return json_encode([
            'document' => [
                'document_type' => 'invoice',
                'invoice' => [
                    'sub_type' => $subType,
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
