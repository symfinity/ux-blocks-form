# FloatingField

Floating label wrapper for text inputs and textareas.

## When to use

Compact forms where the label sits inside the control border (Bootstrap-style). **Do not** use with [Select](select.md) — use [Field](field.md) instead.

## Properties

| Prop | Default | Notes |
|------|---------|-------|
| `label` | — | Label text (floats on focus/value) |
| `hint` | — | Helper text |
| `error` | — | Validation message |
| `invalid` | `false` | Error styling |

The nested control needs a placeholder of `" "` (single space) so the float animation works.

## Usage

```twig
<twig:FloatingField label="Email">
    <twig:Input name="email" type="email" placeholder=" " />
</twig:FloatingField>
```

## Accessibility

- Label is associated with the nested control via generated ids.
- Do not wrap [Select](select.md) inside FloatingField.

## Related

- [Field](field.md) · [Input](input.md)
