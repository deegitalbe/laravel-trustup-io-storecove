---
"@deegitalbe/laravel-trustup-io-storecove": patch
---

Accept a line id over 36 characters, a company name under 2 characters and an empty line name on inbound documents.

A received document carrying one of these values was refused as a whole on read and never booked. These are Storecove limits for documents TrustUp sends, so they now apply only to values TrustUp sets itself; every other limit on a received document is unchanged.
