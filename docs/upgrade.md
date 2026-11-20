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

## 0.1.2

Documentation and split-mirror hygiene patch after [v0.1.1](https://github.com/symfinity/ux-blocks-form/releases/tag/v0.1.1). Handbook component pages, symfinity-docs example manifests, ROADMAP, and sponsor metadata — no component API changes.

```bash
composer update symfinity/ux-blocks-form
```

No migration steps. Optional: browse per-role guides under [docs/components/](components.md) or pair with `symfinity/symfinity-docs` for rendered handbook pages.

## 0.1.3

OOTB handbook and CSS cascade hygiene after [v0.1.2](https://github.com/symfinity/ux-blocks-form/releases/tag/v0.1.2). Grouped component example manifests, `@layer blocks.form` tier CSS, verification page, and PHPUnit bootstrap cleanup — no component props or registry ids changed.

```bash
composer update symfinity/ux-blocks-form symfinity/ux-blocks-core
```

After upgrade:

1. Clear Symfony cache and hard-refresh the browser if AssetMapper serves cached CSS in dev.
2. Pair with `symfinity/ux-blocks-core` **^0.1.6** so form fragments get auto-injected inline tier CSS (`id="ux-blocks-form-css"`).
3. Optional: run the [verification](verification.md) clean-app smoke if you embed form components without ui-kernel.

## 0.1.4

Component docs ship in the Composer archive. Role stylesheets quote attribute values; the selectors match the same elements.

Extra attributes on Input are rendered before the component's own variant, value, placeholder, state, and `type`.

Dev installs require `symfinity/ui-kernel` `^0.3`. Runtime requirements are unchanged.

```bash
composer update symfinity/ux-blocks-form
```

No config or template changes are required after upgrade.

## 0.1.5

The package Sass build keeps quoted attribute selectors. Shipped role CSS is unchanged from 0.1.4. No config or template changes.

```bash
composer update symfinity/ux-blocks-form
```

## Future releases

See [CHANGELOG](https://github.com/symfinity/ux-blocks-form/blob/main/CHANGELOG.md) for version-to-version notes.
