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

## Future releases

See [CHANGELOG](https://github.com/symfinity/ux-blocks-form/blob/main/CHANGELOG.md) for version-to-version notes.
