# @deegitalbe/laravel-trustup-io-storecove

## 2.2.3

### Patch Changes

- eec00e3: Accept the HWE quantity unit code and the csv and xlsx attachment mime types on inbound documents.

  A received document was discarded whole when a single line item or attachment carried a value outside a generated allow-list. Three such values were stranding real invoices: HWE (a labour unit code sent by staffing agencies, alongside the already-accepted LH and DAY), csv attachments, and xlsx attachments.

## 2.2.2

### Patch Changes

- 3d5e786: Fix Invoice model deserialization: add missing `prepayment_invoice` value to `sub_type` allowable values (received advance-payment invoices via Peppol)

## 2.2.1

### Patch Changes

- d736972: Fix Reference model deserialization: add missing `line_despatch_document_reference` enum value and accept raw numeric codes in `documentTypeCode`

## 2.2.0

### Minor Changes

- 0b93096: Add self_billing_supplier_party and self_billing_buyer_party getters, and accept the self_billed_invoice sub_type and email source on received documents

## 2.1.0

### Minor Changes

- Support self-billing reception on the Invoice / ReceivableDocument models. Adds `self_billing_supplier_party` and `self_billing_buyer_party` to the Invoice model (with getters/setters, typed as AccountingSupplierParty / AccountingCustomerParty), and accepts the `self_billed_invoice` sub_type and `email` source on received documents so they deserialize without throwing.

## 1.0.7

### Patch Changes

- 67ccc05: Preventing package validation to throw for data we do no use.

## 1.0.6

### Patch Changes

- 81c5f84: removing useless validation for documentId

## 1.0.5

### Patch Changes

- be5961b: Removing str lenght check for phone on contact this will be handled in the tools api.

## 1.0.4

### Patch Changes

- 765aa63: Api exception error.

## 1.0.3

### Patch Changes

- 9da8027: ? address component is definitely valid. Thanks Api for this good good validation.

## 1.0.2

### Patch Changes

- d6a2cc0: Remove the regex that validate the attachment filename.

## 1.0.1

### Patch Changes

- b5fba39: Case issue.

## 1.0.0

### Major Changes

- 4319883: STORECON generation.

## 0.2.1

### Patch Changes

- ad78ed2: Returning callback value.

## 0.2.0

### Minor Changes

- c49afa3: Throws storecove formated errors.

## 0.1.3

### Patch Changes

- a2af472: Handling storecove exception errors.

## 0.1.2

### Patch Changes

- 1905ffa: handling storecove errors.

## 0.1.1

### Patch Changes

- 913720a: Fixing typing.

## 0.1.0

### Minor Changes

- db8cf32: Initialize storecove package
