---
"@deegitalbe/laravel-trustup-io-storecove": patch
---

Accept the HWE quantity unit code and the csv and xlsx attachment mime types on inbound documents.

A received document was discarded whole when a single line item or attachment carried a value outside a generated allow-list. Three such values were stranding real invoices: HWE (a labour unit code sent by staffing agencies, alongside the already-accepted LH and DAY), csv attachments, and xlsx attachments.
