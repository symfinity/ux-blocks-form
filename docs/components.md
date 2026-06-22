# Components

## Interaction profile

| Token | Meaning in this package |
|-------|-------------------------|
| `nat` | Native HTML + ui-kernel / package CSS — default for every role |
| `act` | Toggle-button labels and `InputGroup` use core `Button` chrome |
| `stl` | Not in this package — see `symfinity/ux-blocks-extended` |
| `live` | Not in this package — see LiveComponent tiers |

Fragment prefix: **`blocks`** (example: `blocks.input`, `blocks.field`).

## Component index

| Role | Twig | Interaction | Notes |
|------|------|-------------|-------|
| label | Label | nat | Associates with a control `for` id |
| input | Input | nat | Text types, icons, temporal adornments |
| textarea | Textarea | nat | Auto-grow where supported |
| checkbox | Checkbox | nat | Optional `appearance="button"` |
| radio | Radio | nat | Optional `appearance="button"` |
| radio-group | RadioGroup | nat | Segmented toggle mode |
| select | Select | nat | Placeholder, `multiple`, validation |
| switch | Switch | nat | Custom toggle chrome |
| file-input | FileInput | nat | Native file picker |
| file-upload | FileUpload | nat | Button + filename readout |
| input-group | InputGroup | nat | Composes core `Button` |
| fieldset | Fieldset | nat | Optional `legend` |
| field | Field | nat | Label, control slot, hint/error |
| floating-field | FloatingField | nat | Floating label; not for `Select` |
| range | Range | nat | Optional `showValue` readout |
| form | Form | nat | Semantic form shell |
| form-actions | FormActions | nat | Footer toolbar alignment |

The README component table matches this inventory for each release.

## Using components

Twig tag name matches the **Twig** column (`<twig:Input>`, `<twig:Field>`, …). Nest controls inside compounds:

```twig
<twig:Field label="Email">
    <twig:Input name="email" type="email" />
</twig:Field>
```

`Button` and `ButtonGroup` remain in **`symfinity/ux-blocks-core`**.

## Related packages

| Package | Role |
|---------|------|
| `symfinity/ux-blocks-core` | Buttons, typography, layout primitives |
| `symfinity/ux-blocks-extended` | Dialogs, cards, tables |
| `symfinity/form-ui-extensions-bundle` | Symfony Form `FormView` bridge |

See [Quick start](quickstart.md) for a minimal template.
