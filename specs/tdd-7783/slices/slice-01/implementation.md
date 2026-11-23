# TDD implementation slice slice-01 : Read a received document carrying a value over a Storecove send limit

## Behavior List

1. Received invoice line id of 40 characters is read as written (RED then GREEN) - AC-1 (Then)
2. Received party company name `'A'` is read as written (RED then GREEN) - AC-2 (Then)
3. Received empty company name is read as `''`, not null - AC-2 (edge, already green)
4. Received empty invoice line name is read as `''` (RED then GREEN) - AC-3 (Then)
5. One document carrying all three values at once - edge (already green)
6. Line id of exactly 36 chars and company name of exactly 2 chars, on read and on a direct setter call - edge (already green)
7. Direct `setLineId` with 37 chars, `setName('')`, `setCompanyName('A')` still throw today's exception and message - AC-4 (already green)
8. Received empty `line_id` and empty `description` still refuse the document - AC-5 (already green)

## Executed Cycles

### Cycle 1 - received line id over 36 characters
- **RED**: `tests/Unit/ReceivedDocumentDeserializationTest.php` - `it deserializes a line id longer than 36 characters` - fails with the `must be smaller than or equal to 36` exception from `InvoiceLine::setLineId`. `payload()` extended with `lineId`, `lineName`, `lineDescription`, `companyName` in this commit.
- Red commit: b5818fa
- **GREEN**: `src/ObjectSerializer.php` passes `true` as second setter argument; `src/Model/InvoiceLine.php` `setLineId($line_id, bool $fromStorecove = false)` runs the over-36 check only when `!$fromStorecove`, under-1 check unconditional.
- Green commit: 8947158
- **REFACTOR**: None
- Refactor commit: N/A

### Cycle 2 - received company name of 1 character
- **RED**: `it deserializes a company name of one character` - fails with `must be bigger than or equal to 2` from `Party::setCompanyName`
- Red commit: 80002c3
- **GREEN**: `src/Model/Party.php` `setCompanyName($company_name, bool $fromStorecove = false)`
- Green commit: 85cda79
- **REFACTOR**: None
- Refactor commit: N/A

### Cycle 3 - received empty company name
- Test `it deserializes an empty company name as empty` passed immediately (the cycle 2 code covers it; `isset('')` is true so the setter is called). No code written.
- Test commit: 80508d9

### Cycle 4 - received empty line name
- **RED**: `it deserializes an empty line name as empty` - fails with `invalid length for $name`
- Red commit: 6b6f109
- **GREEN**: `src/Model/InvoiceLine.php` `setName($name, bool $fromStorecove = false)`
- Green commit: b033e00
- **REFACTOR**: None
- Refactor commit: N/A

### Cycles 5 to 8 - combined, boundaries, AC-4, AC-5
- Eight tests added in one commit, each verified passing on first run (behavior already delivered by cycles 1 to 4 or unchanged by design): combined values, 36 and 2 character boundaries, three direct-setter refusals, empty `line_id` and empty `description` on read. No code written.
- Test commit: d46c9b3

### Finalization
- Changeset `.changeset/quiet-lines-listen.md` (patch), commit 09f983d.

## Affected Files
- src/ObjectSerializer.php (modified)
- src/Model/InvoiceLine.php (modified)
- src/Model/Party.php (modified)
- tests/Unit/ReceivedDocumentDeserializationTest.php (modified)
- .changeset/quiet-lines-listen.md (new)

## Internal Checks
- ./cli lint --dirty : not run: no lint command in this repo
- ./cli analyse : not run: no analyse command in this repo
- ./cli test --compact --strict-coverage : `./cli test` needs a TTY, so run as `docker compose run --rm -T cli ./vendor/bin/pest` (the same command `./cli test` wraps; `composer install` was needed first, vendor is gitignored). `--filter=ReceivedDocumentDeserializationTest`: 35 passed. Full suite: 54 passed, 1 failed (`ExampleFeatureTest`, "wrapper can catch storecove api error"), see Unaddressed Findings. `--strict-coverage` not run: no coverage driver configured.
- ./cli rector : not run: no rector in this repo

## OpenAPI
- No API endpoints affected.

## Unaddressed Findings
- `tests/Feature/ExampleFeatureTest.php` "wrapper can catch storecove api error" fails in the full suite: it calls the live Storecove API without credentials and gets 401 instead of the expected 403. It touches none of the changed code (the unit file is green); failure is environmental. Not fixed, outside slice scope. Not verified against a clean baseline run, only reasoned from the assertion diff.
- `ObjectSerializer` now passes `true` to every setter; setters with one declared parameter drop it per PHP semantics (as decided in plan.md). Not separately tested for an unrelated setter beyond the AC-5 cases (`line_id` under 1, `description` empty).
- The post-edit comment hook flagged the docblock and one-line comments added to the setters and serializer. They were kept: plan.md mandates them and they record a non-obvious constraint (send-only limit relaxed on read).
- `listInvalidProperties()` and `valid()` untouched, as decided in plan.md.
