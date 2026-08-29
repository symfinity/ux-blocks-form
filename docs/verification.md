# Verification

**Integration profile:** P2 — embed (form tier components; CSS via ux-blocks-core auto stack).

## Local commands

```bash
composer test
composer phpstan
```

## Clean-app smoke

```bash
composer require symfinity/ux-blocks-form
```

Render `<twig:Field label="Email" name="email" />` — expect `data-ui-role="field"` and tier CSS markers `id="ux-blocks-core-css"` + `id="ux-blocks-form-css"`.

## See also

- [Quick start](quickstart.md)
- [CHANGELOG](../CHANGELOG.md)
