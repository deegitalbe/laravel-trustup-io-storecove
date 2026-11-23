# Slice 1: Read a received document carrying a value over a Storecove send limit

## Covered ACs
- **AC-1**: a received invoice line id longer than 36 characters is read and returned as written.
- **AC-2**: a received party company name of 1 character, or empty, is read and returned as written.
- **AC-3**: a received empty invoice line name is read and returned as empty.
- **AC-4**: the same three values set by TrustUp itself (a direct setter call, as worksite-api does when sending) are still refused with today's exception and message.
- **AC-5**: every other limit on a received document still refuses it (empty line id, empty line description).

## Dependencies
None.

## Objective
Received Peppol documents are read through `ObjectSerializer::deserialize`, which calls the setter of every property. Three setters enforce limits that Storecove sets for documents TrustUp sends: `InvoiceLine::setLineId` (max 36), `InvoiceLine::setName` (min 1) and `Party::setCompanyName` (min 2). They throw while a received document is read, and the whole document is lost. The reader must tell these three setters that the value comes from Storecove, so that they skip only that send limit, while direct calls keep refusing exactly as today.

Mechanism (decided): in the model branch of `ObjectSerializer::deserialize`, call `$instance->$propertySetter($value, true)`. The three setters gain a second parameter `bool $fromStorecove = false` and wrap only their send-limit check in `!$fromStorecove &&`. PHP silently drops the extra argument for every other setter, which declares a single parameter, so their checks are untouched. `setLineId` keeps its under-1 check unconditionally. Do not touch `listInvalidProperties()` or `valid()`.

## Files
- `src/ObjectSerializer.php` (modified) — in `deserialize()`, model branch (the `foreach ($instance::swaggerTypes() ...)` loop near the end), pass `true` as the second argument to `$instance->$propertySetter(...)`, with a one-line comment saying the value comes from Storecove and that setters which don't declare the parameter drop it.
- `src/Model/InvoiceLine.php` (modified) — `setLineId($line_id, bool $fromStorecove = false)`: the `> 36` check runs only when `!$fromStorecove`, the `< 1` check always runs. `setName($name, bool $fromStorecove = false)`: the `< 1` check runs only when `!$fromStorecove`. Exception messages unchanged. Docblock on each: the limit is Storecove's rule for sent documents; a received value is kept as written; document the new `@param`. Same docblock style as `Invoice::setSubType`.
- `src/Model/Party.php` (modified) — `setCompanyName($company_name, bool $fromStorecove = false)`: the `< 2` check runs only when `!$fromStorecove`. Message unchanged. Docblock as above.
- `tests/Unit/ReceivedDocumentDeserializationTest.php` (modified) — PHPUnit class style of the file. Extend `payload()` with optional `lineId`, `lineName`, `lineDescription` and `companyName` arguments: put `line_id` / `name` / `description` on the invoice line only when given (keep `description: 'labour'` as default), and add `accounting_supplier_party: { party: { company_name: ... } }` to the invoice only when `companyName` is given. Read values back with `->getDocument()->getInvoice()->getInvoiceLines()[0]` and `->getAccountingSupplierParty()->getParty()->getCompanyName()`.
- `.changeset/<name>.md` (new) — `"@deegitalbe/laravel-trustup-io-storecove": patch`, one summary line, then a short paragraph: received documents with a line id over 36 characters, a company name under 2 characters or an empty line name were refused on read; those Storecove send limits now apply only to values TrustUp sets itself. Shape: `.changeset` entry of commit 78c599e (TDD-5555).

## Expected tests
- Nominal AC-1: received document whose invoice line `line_id` is 40 characters → deserializes, `getLineId()` returns the same 40 characters.
- Nominal AC-2: received document whose supplier party `company_name` is `'A'` → deserializes, `getCompanyName()` returns `'A'`.
- AC-2 empty: supplier party `company_name` is `''` → deserializes, `getCompanyName()` returns `''` (not null).
- Nominal AC-3: invoice line `name` is `''` → deserializes, `getName()` returns `''`.
- Edge, all three at once: one document with a 40-character line id, an empty line name and company name `'A'` → deserializes, each value returned as written.
- Edge, boundaries: line id of exactly 36 characters and company name of exactly 2 characters → accepted on read and on a direct setter call.
- AC-4 line id: `(new InvoiceLine())->setLineId(<37 characters>)` → `InvalidArgumentException`, message contains `must be smaller than or equal to 36`.
- AC-4 name: `(new InvoiceLine())->setName('')` → `InvalidArgumentException`, message contains `$name`.
- AC-4 company name: `(new Party())->setCompanyName('A')` → `InvalidArgumentException`, message contains `must be bigger than or equal to 2`.
- AC-5 line id: received invoice line with `line_id` `''` → `InvalidArgumentException`, message contains `$line_id` and `bigger than or equal to 1`.
- AC-5 description: received invoice line with `description` `''` → `InvalidArgumentException`, message contains `$description`.
- Existing tests in the file keep passing unchanged.

## Verification
- [ ] `./cli test --filter=ReceivedDocumentDeserializationTest` — all tests pass
- [ ] `./cli test` — full suite passes
