# Field

Label, control slot, hint, and error message in one compound.

## When to use

Default wrapper for form controls. Put **Input**, **Select**, **Textarea**, or **Checkbox** in the default slot. Use instead of floating labels when you want the label above the control.

## Properties

| Prop | Default | Notes |
|------|---------|-------|
| `label` | — | Visible field label |
| `hint` | — | Helper text below the control |
| `error` | — | Validation message (also sets invalid state) |
| `invalid` | `false` | Error styling when no `error` text yet |

Orientation defaults to vertical; pass `orientation="horizontal"` on the tag for label beside control layouts.

## Usage

```twig
<twig:Field label="Email" hint="We never share your email.">
    <twig:Input name="email" type="email" required />
</twig:Field>
```

## Accessibility

Field wires `label`, `hint`, and `error` ids to the control automatically. Keep one control per Field.

## Related

- [FloatingField](floating-field.md) · [Input](input.md)
