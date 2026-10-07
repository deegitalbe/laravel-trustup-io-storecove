---
"@deegitalbe/laravel-trustup-io-storecove": patch
---

Accept the png, jpeg and ods attachment mime types on inbound documents.

The attachment allow-list held only three of the six mime types permitted by the Peppol BIS Billing 3.0 MimeCode list, so a received invoice carrying a photo (`image/jpeg`, `image/png`) or an OpenDocument spreadsheet failed deserialization and was never booked. The allow-list now covers the whole Peppol list, plus `application/xml`.
