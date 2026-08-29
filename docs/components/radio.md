# Radio

Single radio option inside a group.

## When to use

Single radio option inside a group. Use **Radio** when this pattern fits the screen — variant previews are below.

## Guidelines

**Do**

- Associate every control with a visible label.
- Use native `type` and validation attributes first.

**Don't**

- Rely on placeholder text instead of labels.
- Disable submit without explaining why.

## Usage

```twig
<twig:Radio name="plan" value="pro" label="Pro" />
```


## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | `string?` | — | Slot or scalar content |

## Accessibility

- Errors must be programmatically associated with fields.
- Switches and checkboxes need explicit labels.

## Related

- [RadioGroup](radio-group.md)
