---
"@deegitalbe/laravel-trustup-io-storecove": patch
---

Read a received document with the values exactly as delivered.

A received invoice carrying a value the sending rules refuse (a supplier company name of 1 character, an unknown unit code, attachment mime type or currency code) failed deserialization and was never booked. `ReceivedDocumentsApi::getReceivedDocument` now deserializes in a tolerant mode: each value still goes through its setter, and a value the setter refuses is kept as delivered. `ObjectSerializer::deserialize()` takes a trailing `bool $validate = true`, so sending and every other call keep their checks.
