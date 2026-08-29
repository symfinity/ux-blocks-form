# Installation

## Prerequisites

Add the [symfinity/recipes](https://github.com/symfinity/recipes) Flex endpoint to your project's `composer.json` (see [recipes README](https://github.com/symfinity/recipes/blob/main/README.md)).

## Composer

```bash
composer require symfinity/ux-blocks-form
```

This package requires `symfinity/ux-blocks-core` and `symfinity/ux-blocks` — Composer installs them automatically.

## Symfony Flex

The `0.1` recipe applies:

- Registers `SymfinityUxBlocksFormBundle` for **all** environments
- Copies default route configuration (no public HTTP routes in this package)

## Manual installation

When Flex is unavailable:

1. `composer require symfinity/ux-blocks-form`
2. Register the bundle in `config/bundles.php`:

```php
return [
    // ...
    Symfinity\UxBlocksForm\SymfinityUxBlocksFormBundle::class => ['all' => true],
];
```

3. Import AssetMapper paths if you are not using the bundle defaults — see [Configuration](configuration.md).

## Verify

```bash
php bin/console debug:container Symfinity\\UxBlocksForm\\
php bin/console debug:twig-component
```

You should see form components such as `Input`, `Field`, and `Select` in the UX Twig component list.

## See also

- [Quick start](quickstart.md)
