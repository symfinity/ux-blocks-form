# Range

Numeric range slider.

## When to use

Numeric range slider. Use **Range** when this pattern fits the screen — variant previews are below.

## Guidelines

**Do**

- Associate every control with a visible label.
- Use native `type` and validation attributes first.

**Don't**

- Rely on placeholder text instead of labels.
- Disable submit without explaining why.

## Usage

```twig
<twig:Range name="volume" min="0" max="100" />
```


## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `disabled` | `string` | — | Component attribute |

## Accessibility

- Errors must be programmatically associated with fields.
- Switches and checkboxes need explicit labels.

## Related

- [Input](input.md)
