# Checkbox

Boolean choice — native control or toggle-button appearance.

## When to use

Single on/off consent, multi-select lists, or segmented toggle buttons (`appearance="button"`). For a single on/off with immediate effect, consider [Switch](switch.md).

## Guidelines

**Do**

- Always provide a visible `label` (or associate an external label with `for`).
- Use `appearance="button"` for toolbar-style multi-select toggles.
- Set `variant` to match semantic intent in button mode.

**Don't**

- Use checkboxes for mutually exclusive choices — use [RadioGroup](radio-group.md).
- Rely on colour alone for the checked state.

## Usage

```twig
<twig:Checkbox name="agree" label="I agree to the terms" />
```

Toggle-button mode matches [ux-blocks-form toggle buttons](https://docs.symfinity.dev/ux-blocks-form/components/checkbox) (Bootstrap `.btn-check` parity).

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `appearance` | `string` | `control` | `control` or `button` |
| `variant` | `string` | `primary` | Semantic colour (button appearance) |
| `label` | `string` | — | Visible label text |
| `checked` | `bool` | `false` | Initial checked state |
| `disabled` | `bool` | `false` | Non-interactive |

Pass `name`, `id`, `value`, and native attributes on the tag.

## Accessibility

- Label must be programmatically associated with the input.
- In button appearance, ensure the control has a discernible name.
- Group related checkboxes with [Fieldset](fieldset.md) when appropriate.

## Related

- [Switch](switch.md) · [Radio](radio.md) · [Field](field.md)
