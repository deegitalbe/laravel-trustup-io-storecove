# Product Spec : Accept received documents that break Storecove sending limits

Ticket : TDD-7783, branch `tdd-7783`

## Problem Statement

29 received Peppol documents across 24 tenants never become expenses and fail again every night. Each one carries a value that breaks a limit Storecove sets for documents being **sent**: an invoice line id longer than 36 characters (26 documents, 23 tenants), a company name shorter than 2 characters (3 documents, 1 tenant), or an empty invoice line name (3 occurrences since 2026-11-22). The same limits are applied when TrustUp reads a **received** document, so a valid document written by a third-party sender is refused as a whole, before it is even classified, and the invoice is lost.

Same class of defect as TDD-3605, TDD-5254 and TDD-5555: only the specific limits that reject real inbound documents are lifted, every other limit stays.

## Actors

-   TrustUp reception : reads documents received from the Peppol network through Storecove, to turn them into expenses or self-billed invoices.
-   TrustUp sending : prepares an invoice a tenant sends to Storecove.
-   Third-party sender : the supplier or customer who wrote the received document.

## Acceptance Criteria

### AC-1 : Received line id longer than 36 characters

-   **Who** : TrustUp reception
-   **Given** : a received document has an invoice line whose id is longer than 36 characters
-   **When** : TrustUp reception reads the document
-   **Then** : the system shall read the whole document and return that line id exactly as the third-party sender wrote it

### AC-2 : Received company name shorter than 2 characters

-   **Who** : TrustUp reception
-   **Given** : a received document has a party whose company name has 1 character or is empty
-   **When** : TrustUp reception reads the document
-   **Then** : the system shall read the whole document and return that company name exactly as the third-party sender wrote it

### AC-3 : Received empty line name

-   **Who** : TrustUp reception
-   **Given** : a received document has an invoice line whose name is empty
-   **When** : TrustUp reception reads the document
-   **Then** : the system shall read the whole document and return that line name as empty

### AC-4 : Sent invoices keep the three limits

-   **Who** : TrustUp sending
-   **Given** : an invoice being prepared for sending has a line id longer than 36 characters, a company name with 1 character or empty, or an empty line name
-   **When** : TrustUp sending sets that value on the invoice
-   **Then** : the system shall refuse the value before the invoice leaves TrustUp, with the same refusal as today

### AC-5 : Every other limit on received documents is unchanged

-   **Who** : TrustUp reception
-   **Given** : a received document breaks a limit other than the three above, such as an empty invoice line id or an empty line description
-   **When** : TrustUp reception reads the document
-   **Then** : the system shall refuse the document with the same refusal as today

## Edge Cases

-   One received document carrying all three values at once : read whole, each value returned exactly as written.
-   Line id of exactly 36 characters, company name of exactly 2 characters : accepted in both directions, as today.
-   Line name made only of spaces : already accepted today in both directions, unchanged.
-   Empty company name on a received document : returned as empty, never replaced by a default or treated as missing.

## Out of Scope

-   Raising the required version of this package in worksite-api and re-locking it (handled separately, once this release is published from main).
-   Re-processing the 29 stranded documents: the nightly retry in worksite-api picks them up again once it runs the new release.
-   Failures those 29 documents may hit at the expense step for the first time (media upload refusal, attachment crash, see TDD-7752).
-   Supplier contacts created in worksite-api without a usable company name. This already happens today for a received invoice with no company name and no VAT match; this change only adds the empty and 1-character variants.
-   Any other Storecove sending limit not yet observed rejecting a real received document.
