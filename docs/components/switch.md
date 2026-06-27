# Switch

On/off toggle for settings that take effect immediately.

## When to use

Binary preferences (notifications, feature flags) where the change applies without a separate Save step. For form submits with many fields, prefer [Checkbox](checkbox.md) in a [Field](field.md) group.

## Guidelines

**Do**

- Pair with a visible `label` on the same row.
- Use for settings with immediate effect; disable during async saves.
- Set `variant` to match semantic intent when using coloured track styling.

**Don't**

- Use switches for one-shot consent on a submit form — use checkbox + submit.
- Offer more than two states — use [RadioGroup](radio-group.md) or [Select](select.md).

## Usage

```twig
<twig:Switch name="alerts" label="Email alerts" />
```

Aligned with native switch / toggle patterns in modern design systems.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | `string` | `primary` | Semantic colour for the track |
| `checked` | `bool` | `false` | Initial on state |
| `disabled` | `bool` | `false` | Non-interactive |

Pass `name`, `label`, `id`, and native attributes on the tag.

## Accessibility

- Label must be associated with the switch control.
- Do not rely on colour alone for on/off state — position and label carry meaning.

## Related

- [Checkbox](checkbox.md) · [Field](field.md)
