<div align="center">

# UX Blocks Form

### Form-domain Twig components — labels, inputs, compounds, and native interaction CSS

[![PHP Version](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white)](composer.json)
[![Symfony](https://img.shields.io/badge/Symfony-7.4+-343434?style=flat&logo=symfony&logoColor=white)](composer.json)

</div>

Domain foundation sibling to `symfinity/ux-blocks-core`. Ships **seventeen** native form roles with `category: form` registry facet and `nat`/`act` interaction profile.

## Installation

```bash
composer require symfinity/ux-blocks-core symfinity/ux-blocks-form
```

Requires `symfinity/ux-blocks-core` (for `<twig:Button>` in input groups and shared tokens). Does **not** require ui-kernel.

## Roles

<!-- ux-blocks:registry:start -->
| Role | Twig | Interaction | Fragment | Status |
|------|------|-------------|----------|--------|
| label | Label | nat | `blocks.label` | shipped |
| input | Input | nat | `blocks.input` | shipped |
| textarea | Textarea | nat | `blocks.textarea` | shipped |
| checkbox | Checkbox | nat | `blocks.checkbox` | shipped |
| radio-group | RadioGroup | nat | `blocks.radio-group` | shipped |
| select | Select | nat | `blocks.select` | shipped |
| switch | Switch | nat | `blocks.switch` | shipped |
| file-input | FileInput | nat | `blocks.file-input` | shipped |
| input-group | InputGroup | nat | `blocks.input-group` | shipped |
| fieldset | Fieldset | nat | `blocks.fieldset` | shipped |
| field | Field | nat | `blocks.field` | shipped |
| floating-field | FloatingField | nat | `blocks.floating-field` | shipped |
| range | Range | nat | `blocks.range` | shipped |
| radio | Radio | nat | `blocks.radio` | shipped |
| form | Form | nat | `blocks.form` | shipped |
| form-actions | FormActions | nat | `blocks.form-actions` | shipped |
| file-upload | FileUpload | nat | `blocks.file-upload` | shipped |
<!-- ux-blocks:registry:end -->

| Role | Fragment | Notes |
|------|----------|-------|
| `label` | `blocks.label` | Native label |
| `input` | `blocks.input` | Text controls + icon slots; temporal types auto-adorn |
| `textarea` | `blocks.textarea` | Auto-grow via `field-sizing: content` where supported |
| `checkbox` | `blocks.checkbox` | Native toggle chrome; `appearance="button"` (A1) |
| `radio-group` | `blocks.radio-group` | Item sub-component; segmented toggle mode |
| `radio` | `blocks.radio` | Standalone radio; `appearance="button"` (112) |
| `select` | `blocks.select` | Progressive `appearance: base-select` layer; `multiple` |
| `switch` | `blocks.switch` | Custom toggle |
| `file-input` | `blocks.file-input` | Native file picker |
| `file-upload` | `blocks.file-upload` | Hidden input + button chrome + filename readout |
| `input-group` | `blocks.input-group` | Composes core `Button` |
| `fieldset` | `blocks.fieldset` | Native grouping; optional `legend` |
| `field` | `blocks.field` | 108 composition language compound |
| `floating-field` | `blocks.floating-field` | Floating label compound; **MUST NOT** wrap `Select` |
| `range` | `blocks.range` | Native range; optional `showValue` readout |
| `form` | `blocks.form` | Semantic form shell |
| `form-actions` | `blocks.form-actions` | Footer toolbar (`align`: start \| stretch \| end) |

`button` and `button-group` remain in **core** — not form-only.

## Kiosk

When `symfinity/ux-blocks-kiosk` is installed: **`GET /kiosk/blocks/form`**.

## Suggested pairing

```bash
composer require symfinity/form-ui-extensions-bundle
```

Optional Symfony Form bridge — not required by this package.

## Maintainer Sass pipeline (120)

Author role CSS in `assets/scss/`; ship compiled CSS under `assets/styles/`. Shell rules live in `assets/scss/partials/_form-shell.scss`; `_bundle.scss` is `@use` only. From product monorepo root:

```bash
cd src/symfinity
bin/blocks-css-compile --package=ux-blocks-form
bin/blocks-css-compile --check --package=ux-blocks-form
bin/ux-blocks-scss-audit --package=ux-blocks-form --check
```

**MUST NOT** hand-edit compiled CSS for roles with a matching `.scss` source. See [ux-blocks maintainer Sass pipeline](../ux-blocks/README.md#maintainer--sass-author-pipeline-120).
