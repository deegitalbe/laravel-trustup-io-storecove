---
"@deegitalbe/laravel-trustup-io-storecove": patch
---

Stop discarding received documents whose `sub_type` is not in the generated allow-list.

`sub_type` is inbound-only (the model's own docblock says it is never used for sending), but `setSubType()` threw on any unlisted value, so a single unrecognised UNCL1001 document type aborted deserialization and stranded the whole invoice. Nine such values were live in production at once, including `debit_note_related_to_financial_adjustments`, `factored_invoice`, `insurers_invoice` and `final_construction_invoice`. The value is now stored as received; `getSubTypeAllowableValues()` still lists the known ones.
