# Upgrade guide

## First public release (`v0.1.0`)

This is the first tagged release on Packagist and the read-only split mirror. There is no migration from a prior semver line.

### Install

```bash
composer require symfinity/ux-blocks-form:^0.1
```

Ensure the [symfinity/recipes](https://github.com/symfinity/recipes) Flex endpoint is configured so the install recipe runs.

### What you get

- Symfony bundle registered for all environments
- Seventeen form-domain Twig component roles with `blocks.*` fragment ids
- `symfinity/ux-blocks-core` and `symfinity/ux-blocks` installed as dependencies

## 0.1.1

Patch release after [v0.1.0](https://github.com/symfinity/ux-blocks-form/releases/tag/v0.1.0). Regenerated form role CSS — no component props or registry ids changed.

```bash
composer update symfinity/ux-blocks-form
```

After upgrade:

1. Clear Symfony cache and hard-refresh AssetMapper CSS in dev.
2. Re-check toggle-button, switch, and floating-field layouts if you use visual regression tests.

## Future releases

See [CHANGELOG](https://github.com/symfinity/ux-blocks-form/blob/main/CHANGELOG.md) for version-to-version notes.
