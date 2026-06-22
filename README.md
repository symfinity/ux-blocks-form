<div align="center">

# UX Blocks Form

### Form domain Twig components: labels, inputs, compounds, and native interaction CSS

[![PHP Version](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white)](composer.json)
[![Symfony](https://img.shields.io/badge/Symfony-7.4+-343434?style=flat&logo=symfony&logoColor=white)](composer.json)
<br/>
[![CI](https://github.com/symfinity/ux-blocks-form/actions/workflows/ci.yml/badge.svg)](https://github.com/symfinity/ux-blocks-form/actions/workflows/ci.yml)
<br/>
[![Release](https://img.shields.io/packagist/v/symfinity/ux-blocks-form.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/symfinity/ux-blocks-form)
[![Downloads](https://img.shields.io/packagist/dt/symfinity/ux-blocks-form.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/symfinity/ux-blocks-form)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)

</div>

> [!NOTE]
> **Read-only mirror.**
> See [CONTRIBUTING.md](CONTRIBUTING.md) for how to propose changes.

## Features

- **Seventeen form roles** — labels, text controls, toggles, selects, compounds, and form shells
- **Native-first (`nat`)** — styled with ui-kernel tokens and package CSS; no Stimulus required for default markup
- **Composition compounds** — `Field` and `FloatingField` with labelled regions for control, hint, and error text
- **Toggle button appearance** — `appearance="button"` on `Checkbox`, `Radio`, and segmented `RadioGroup`
- **Input adornments** — icon slots and automatic icons on date/time inputs
- **Symfony UX Twig components** — `<twig:Input>`, `<twig:Field>`, `<twig:Select>`, and siblings
- **Flex recipe** — bundle registration on install
- **Optional Symfony Form bridge** — pair with `symfinity/form-ui-extensions-bundle` for `FormView` widgets

`button` and `button-group` ship in `**symfinity/ux-blocks-core`** (used by `InputGroup` and toggle-button labels).

## Interaction profile


| Token  | In this package                                                                    |
| ------ | ---------------------------------------------------------------------------------- |
| `nat`  | Default for all roles — native HTML + ui-kernel / package CSS                      |
| `act`  | Toggle-button labels use core `Button` chrome; `InputGroup` composes core `Button` |
| `stl`  | **Not included** — overlay components ship in `symfinity/ux-blocks-extended`       |
| `live` | **Not included** — LiveComponents ship in separate packages                        |


## Component inventory




| Role           | Twig          | Interaction | Fragment                | Status  |
| -------------- | ------------- | ----------- | ----------------------- | ------- |
| label          | Label         | nat         | `blocks.label`          | shipped |
| input          | Input         | nat         | `blocks.input`          | shipped |
| textarea       | Textarea      | nat         | `blocks.textarea`       | shipped |
| checkbox       | Checkbox      | nat         | `blocks.checkbox`       | shipped |
| radio-group    | RadioGroup    | nat         | `blocks.radio-group`    | shipped |
| select         | Select        | nat         | `blocks.select`         | shipped |
| switch         | Switch        | nat         | `blocks.switch`         | shipped |
| file-input     | FileInput     | nat         | `blocks.file-input`     | shipped |
| input-group    | InputGroup    | nat         | `blocks.input-group`    | shipped |
| fieldset       | Fieldset      | nat         | `blocks.fieldset`       | shipped |
| field          | Field         | nat         | `blocks.field`          | shipped |
| floating-field | FloatingField | nat         | `blocks.floating-field` | shipped |
| range          | Range         | nat         | `blocks.range`          | shipped |
| radio          | Radio         | nat         | `blocks.radio`          | shipped |
| form           | Form          | nat         | `blocks.form`           | shipped |
| form-actions   | FormActions   | nat         | `blocks.form-actions`   | shipped |
| file-upload    | FileUpload    | nat         | `blocks.file-upload`    | shipped |




**Highlights:** `Select` supports `multiple` and enhanced styling where the browser allows; `Range` optional value readout; `FileUpload` combines a button with a filename display; do not wrap `Select` inside `FloatingField`; `FormActions` supports `align`: `start`, `stretch`, or `end`.

Handbook: [docs/components.md](docs/components.md).

## Prerequisites

Add the [symfinity/recipes](https://github.com/symfinity/recipes) Flex endpoint to your project's `composer.json` (see [recipes README](https://github.com/symfinity/recipes/blob/main/README.md)) — recipes are not in Symfony's official recipe repository yet.

## Installation

```bash
composer require symfinity/ux-blocks-form
```

Composer installs `symfinity/ux-blocks-core` and `symfinity/ux-blocks` automatically. The Flex recipe registers the bundle for all environments. See [Installation](docs/installation.md) for manual setup and verification.

Pair with `**symfinity/ui-kernel**` when you need theme CSS — see [Quick start](docs/quickstart.md).

## Quick Start

```twig
{# templates/base.html.twig — ui-kernel head (recommended) #}
<head>
    {{ ui_kernel_theme_boot_script() }}
    {{ ui_kernel_css()|raw }}
</head>
```

```twig
{# templates/register.html.twig #}
<twig:Form title="Create account" method="post">
    <twig:Field label="Email" hint="We never share your email.">
        <twig:Input name="email" type="email" placeholder="you@example.com" required />
    </twig:Field>
    <twig:Field label="Password">
        <twig:Input name="password" type="password" required />
    </twig:Field>
    <twig:FormActions align="end">
        <twig:Button type="submit">Sign up</twig:Button>
    </twig:FormActions>
</twig:Form>
```

```twig
{# Segmented choice — toggle button appearance #}
<twig:RadioGroup name="plan" appearance="button" variant="primary">
    <twig:Radio value="free" label="Free" checked />
    <twig:Radio value="pro" label="Pro" />
</twig:RadioGroup>
```

See [Quick start](docs/quickstart.md) for validation states and optional Form bridge pairing.

## Documentation

- **[Quick start](docs/quickstart.md)** — first form layout in minutes
- **[Installation](docs/installation.md)** — Flex, dependencies, verify
- **[Configuration](docs/configuration.md)** — optional bundle settings
- **[Components](docs/components.md)** — role index and fragment prefix
- **[Upgrade](docs/upgrade.md)** — first release and future migrations

## Requirements

- PHP 8.2 or higher
- Symfony 7.4 or 8.x
- Transitive: `symfinity/ux-blocks-core` ^0.1, `symfinity/ux-blocks` ^0.1

## Support

- [GitHub Issues](https://github.com/symfinity/ux-blocks-form/issues)
- [Security](.github/SECURITY.md)
- [Contributing](CONTRIBUTING.md)

## License

[MIT](LICENSE)