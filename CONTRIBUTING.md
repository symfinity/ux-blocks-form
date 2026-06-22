# Contributing to UX Blocks Form

> **Read-only mirror.** This repository (`symfinity/ux-blocks-form`) is published from the Symfinity product monorepo (`packages/ux-blocks-form/`). **Do not expect pull requests to be merged here.**

Normative workflow: [split mirror contributions](https://github.com/symfinity/symfinity-root/blob/main/classified/policy/guidelines/split-mirror-contributions.md) (org guideline).

## Report bugs or request features

Open an [issue](https://github.com/symfinity/ux-blocks-form/issues) on this repository (preferred for discoverability from Packagist and GitHub).

## Contribute code

### External contributors

1. Open an issue describing the change (or comment on an existing one).
2. Open a **proposal pull request** against `main` on this repository **or** attach a patch to the issue.
3. Maintainers review here but **land the change in the product monorepo**. Your split PR will be **closed** with a link to the monorepo commit or PR when shipped.
4. This mirror updates on the next release split — there is no separate merge on this repo.

### Symfinity org collaborators

Open a pull request on the **product monorepo** (`packages/ux-blocks-form/`) on a `feature/{spec-id}-{slug}` branch. Do not rely on merging on this mirror.

## Quality bar

Before we port your patch:

- PHPUnit and PHPStan pass (see [.github/workflows/ci.yml](.github/workflows/ci.yml))
- Tests for behavior changes
- CHANGELOG entries are added by maintainers at release time unless requested

### Running tests

**Split mirror / CI** (only this package’s `vendor/`):

```bash
composer install
vendor/bin/phpunit
vendor/bin/phpstan analyse --memory-limit=512M
```

**Symfinity product monorepo** (do not use package `vendor/bin/phpunit` when `/app/vendor` also exists — dual autoload fatals on `Psr\Container`):

```bash
# from src/symfinity/
./sbin/php vendor/bin/phpunit packages/ux-blocks-form/tests/

# or Docker (org stack)
docker compose --env-file .env.docker run --rm -T -w /app php vendor/bin/phpunit packages/ux-blocks-form/tests/

# package wrapper (delegates to monorepo phpunit when mono.json is present)
docker compose --env-file .env.docker run --rm -T -w /app/packages/ux-blocks-form php bin/phpunit
```

## Security

Report vulnerabilities privately — see [.github/SECURITY.md](.github/SECURITY.md). Do not file security issues in public GitHub issues.
