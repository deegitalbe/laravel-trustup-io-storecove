# Plan : Accept received documents that break Storecove sending limits

## Summary

`ObjectSerializer::deserialize` passes a second argument `true` to every setter it calls while reading a Storecove response. Only `InvoiceLine::setLineId`, `InvoiceLine::setName` and `Party::setCompanyName` declare it (`bool $fromStorecove = false`) and use it to skip their Storecove send limit. Every other setter ignores the extra argument, so its check runs as today, and TrustUp's own calls pass one argument and keep today's refusal.

## Approach

Approach A (Minimalism), retained over B (ambient read scope held in a static of `ObjectSerializer`) and C (inbound subclasses substituted by `ReceivedDocumentsApi`). A carries no state, adds no file, and follows the in-place edit of generated models used by TDD-3605, TDD-5254 and TDD-5555. Its one weakness, a caller passing `true` on purpose, requires a deliberate act that the setter docblock names.

## Existing code reused

- `src/ObjectSerializer.php` — the model branch of `deserialize()` already calls every property's setter; it gains the second argument.
- `src/Model/InvoiceLine.php`, `src/Model/Party.php` — the generated setters keep their checks and messages; only the send limit becomes conditional.
- `tests/Unit/ReceivedDocumentDeserializationTest.php` — its `deserialize()` helper goes through the real `ObjectSerializer::deserialize` path with `Transportable`, the type `ReceivedDocumentsApi::getReceivedDocument` returns; its `payload()` builder gains the new values.
- `.changeset/` — patch entry, same shape as `amber-foxes-wander.md` from TDD-5555.

## File structure

- `src/ObjectSerializer.php` (modified) — the model branch of `deserialize()` calls each setter with `($value, true)`.
- `src/Model/InvoiceLine.php` (modified) — `setLineId` skips the over-36 check and `setName` skips the under-1 check when `$fromStorecove` is true; `setLineId` keeps its under-1 check unconditionally. Docblock explains why.
- `src/Model/Party.php` (modified) — `setCompanyName` skips the under-2 check when `$fromStorecove` is true. Docblock explains why.
- `tests/Unit/ReceivedDocumentDeserializationTest.php` (modified) — received-document cases for AC-1, AC-2, AC-3, AC-5 and the edge cases; direct setter cases for AC-4.
- `.changeset/<generated-name>.md` (new) — patch release note for `@deegitalbe/laravel-trustup-io-storecove`.

## Sketch

1. `ReceivedDocumentsApi::getReceivedDocument` → `ObjectSerializer::deserialize($content, Transportable)`
2. → model branch, for every property: `$instance->$propertySetter($value, true)`
3. → `InvoiceLine::setLineId($v, true)`: skips the over-36 check, keeps the under-1 check   [AC-1, AC-5]
4. → `InvoiceLine::setName($v, true)`: skips the under-1 check   [AC-3]
5. → `Party::setCompanyName($v, true)`, reached through `Invoice.accounting_supplier_party.party` (and every other `Party` holder)   [AC-2]
6. Every other setter declares one parameter; PHP drops the extra argument and its check runs as today   [AC-5]
7. TrustUp sending (w-api `StorecoveInvoiceLineFactory`, `StorecoveAccountingCustomerPartyFactory`) calls the setters with one argument → `$fromStorecove = false` → same refusal as today   [AC-4]

`listInvalidProperties()` and `valid()` are left untouched in both models: nothing in this package or in worksite-api calls them.

`src/ObjectSerializer.php` (modified), model branch of `deserialize()`:

```php
$propertyValue = $data->{$instance::attributeMap()[$property]};
if (isset($propertyValue)) {
    // true: the value comes from Storecove; setters that relax a send-only limit declare it, the others drop it.
    $instance->$propertySetter(self::deserialize($propertyValue, $type, null), true);
}
```

`src/Model/InvoiceLine.php` (modified):

```php
/**
 * Sets line_id
 *
 * The 36-character maximum is Storecove's limit for documents TrustUp sends. A received
 * document is read with $fromStorecove = true and keeps a longer id as its sender wrote it.
 *
 * @param string $line_id The id for this invoice line.
 * @param bool $fromStorecove True when the value is read from a Storecove response.
 *
 * @return $this
 */
public function setLineId($line_id, bool $fromStorecove = false)
{
    if (!$fromStorecove && !is_null($line_id) && (mb_strlen($line_id) > 36)) {
        throw new \InvalidArgumentException('invalid length for $line_id when calling InvoiceLine., must be smaller than or equal to 36.');
    }
    if (!is_null($line_id) && (mb_strlen($line_id) < 1)) {
        throw new \InvalidArgumentException('invalid length for $line_id when calling InvoiceLine., must be bigger than or equal to 1.');
    }

    $this->container['line_id'] = $line_id;

    return $this;
}

/**
 * Sets name
 *
 * The non-empty rule is Storecove's limit for documents TrustUp sends. A received document
 * is read with $fromStorecove = true and keeps an empty name as its sender wrote it.
 *
 * @param string $name A short name for this invoice line. If not provided, it will be taken from description and description will be set to an emtpy string.
 * @param bool $fromStorecove True when the value is read from a Storecove response.
 *
 * @return $this
 */
public function setName($name, bool $fromStorecove = false)
{
    if (!$fromStorecove && !is_null($name) && (mb_strlen($name) < 1)) {
        throw new \InvalidArgumentException('invalid length for $name when calling InvoiceLine., must be bigger than or equal to 1.');
    }

    $this->container['name'] = $name;

    return $this;
}
```

`src/Model/Party.php` (modified):

```php
/**
 * Sets company_name
 *
 * The 2-character minimum is Storecove's limit for documents TrustUp sends. A received
 * document is read with $fromStorecove = true and keeps a shorter name as its sender wrote it.
 *
 * @param string $company_name The name of the company transporting the invoice
 * @param bool $fromStorecove True when the value is read from a Storecove response.
 *
 * @return $this
 */
public function setCompanyName($company_name, bool $fromStorecove = false)
{
    if (!$fromStorecove && !is_null($company_name) && (mb_strlen($company_name) < 2)) {
        throw new \InvalidArgumentException('invalid length for $company_name when calling Party., must be bigger than or equal to 2.');
    }

    $this->container['company_name'] = $company_name;

    return $this;
}
```

## Slices overview

| Slice | Use case | ACs | Depends on |
| ----- | -------- | --- | ---------- |
| slice-01 | Read a received document carrying a value over a Storecove send limit, while sent values keep the limit | AC-1, AC-2, AC-3, AC-4, AC-5 | None |

## Coverage matrix

| AC   | Slice(s) |
| ---- | -------- |
| AC-1 | slice-01 |
| AC-2 | slice-01 |
| AC-3 | slice-01 |
| AC-4 | slice-01 |
| AC-5 | slice-01 |

## Architectural decisions

| Decision | Alternative rejected | Reason |
| -------- | -------------------- | ------ |
| Direction travels as a second setter argument from `ObjectSerializer` | Ambient "reading" counter in a static of `ObjectSerializer` (B) | A static shared by a long-lived queue worker would silently lift send limits for every later send if a decrement were ever missed; an argument has no state. |
| Edit the generated `InvoiceLine` and `Party` in place | Inbound subclasses substituted by `ReceivedDocumentsApi` (C) | C needs a substitution map threaded through every recursion branch of `deserialize()` and every `Transportable` call site; a missed branch silently keeps refusing. In-place edits match TDD-3605/5254/5555. |
| Pass `true` to every setter, not only the three | Per-property allow-list in `ObjectSerializer` | PHP drops extra arguments to user-defined methods (php.net, function arguments; checked on PHP 8.4.23), so a list that must stay in sync with the setters buys nothing. |
| Leave `listInvalidProperties()` unchanged | Remove the three limits from it, as TDD-5254 did for sub_type | It reports on the object regardless of direction, and no caller exists in this package or in worksite-api. |
