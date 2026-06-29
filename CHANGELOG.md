# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.1.2] - 2026-06-29

### Added

- **Handbook component pages** — seventeen per-role guides under `docs/components/` with props, examples, and cross-links from [components.md](docs/components.md)
- **Component example manifests** — `config/component-examples/{role}.yaml` for symfinity-docs handbook SSR (grouped examples per role)
- **ROADMAP.md** — public milestone table for the 0.1.x → 1.0.x release line
- **SUPPORTERS.md** and Composer `funding` metadata for GitHub Sponsors
- **`.github/FUNDING.yml`** — GitHub Sponsors link on the split mirror

### Changed

- **README** — links to `symfinity/ux-blocks-full` for the complete official catalog
- **Handbook** — expanded [usage.md](docs/usage.md); quickstart support footer; components index cleanup
- **Split mirror CI** — PHP 8.2–8.5 × Symfony 7.4, 8.0, and 8.1 with PHPUnit and PHPStan on every matrix cell
- Packagist archives slimmed via `.gitattributes` `export-ignore` rules

### Notes

- No Twig component props or registry role ids changed — documentation and split-mirror hygiene patch after `v0.1.1`
- Pair with `symfinity/ux-blocks-core` `^0.1` (or newer patch) when using refreshed core role CSS together

## [0.1.1] - 2026-06-25

### Changed

- **Role CSS** — regenerated `bundle.css` and per-role styles for `field`, `fieldset`, `floating-field`, `form`, `checkbox`, `radio`, `radio-group`, `switch`, `toggle-button`, `range`, `file-upload`, `input-group`, `input-adornment`, and `input-type-variants`
- **Toggle button** — appearance CSS polish for segmented checkbox/radio controls
- **Switch** — track/thumb contrast and focus ring alignment with core form tokens
- **Floating field** — label float and control padding updates for horizontal layouts

### Notes

- No Twig component props or registry role ids changed — CSS-only patch
- Pair with `symfinity/ux-blocks-core` `^0.1.1` when using the refreshed core role CSS together

## [0.1.0] - 2026-06-23

Initial public release of the UX Blocks Form bundle for Symfony: seventeen native form-domain Twig components, role CSS, and registry integration for the Symfinity UX Blocks catalog.

### Added

- **Seventeen form roles** — `label`, `input`, `textarea`, `checkbox`, `radio`, `radio-group`, `select`, `switch`, `file-input`, `file-upload`, `input-group`, `fieldset`, `field`, `floating-field`, `range`, `form`, and `form-actions` with `blocks.*` fragment ids
- **Twig components** — `<twig:Label>`, `<twig:Input>`, `<twig:Textarea>`, `<twig:Checkbox>`, `<twig:Radio>`, `<twig:RadioGroup>`, `<twig:Select>`, `<twig:Switch>`, `<twig:FileInput>`, `<twig:FileUpload>`, `<twig:InputGroup>`, `<twig:Fieldset>`, `<twig:Field>`, `<twig:FloatingField>`, `<twig:Range>`, `<twig:Form>`, and `<twig:FormActions>`
- **Field compound** — composition-language shell with label header, control slot, and hint or error footer (`data-ui-part` regions)
- **FloatingField** — floating-label compound for text controls (not for wrapping `Select`)
- **Toggle button appearance** — `appearance="button"` on `Checkbox` and `Radio` / segmented `RadioGroup` (Bootstrap `.btn-check` parity)
- **Input** — icon slots; temporal input types receive automatic adornments
- **Textarea** — auto-grow via `field-sizing: content` where the browser supports it
- **Select** — progressive `appearance: base-select` layer and `multiple` support
- **Range** — native slider with optional `showValue` readout
- **FileUpload** — hidden file input with button chrome and filename readout
- **FormActions** — footer toolbar with `align`: `start`, `stretch`, or `end`
- **InputGroup** — composes `<twig:Button>` from `symfinity/ux-blocks-core`
- **Native interaction CSS** — `nat` profile role styles for AssetMapper consumers
- **Symfony integration**
  - Flex recipe `0.1` — bundle registered for all environments; default routes copied from package
  - Twig namespace `UxBlocksForm` for `templates/components/`
- **Compatibility** — PHP 8.2+; Symfony 7.4 and 8.x; requires `symfinity/ux-blocks-core` `^0.1`
- **Handbook** — consumer docs under `docs/`

### Notes

- `button` and `button-group` remain in `symfinity/ux-blocks-core` — not duplicated in this package
- Pair with `symfinity/ui-kernel` when you need design-system CSS variables
- Optional Symfony Form bridge: `symfinity/form-ui-extensions-bundle` (FormView vars and field widgets)
