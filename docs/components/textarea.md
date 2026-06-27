# Textarea

Multi-line text field.

## When to use

Multi-line text field. Use **Textarea** when this pattern fits the screen — variant previews are below.

## Guidelines

**Do**

- Associate every control with a visible label.
- Use native `type` and validation attributes first.

**Don't**

- Rely on placeholder text instead of labels.
- Disable submit without explaining why.

## Usage

```twig
<twig:Textarea name="notes" rows="4" />
```


## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| — | — | — | See Twig component class and package registry. |

## Accessibility

- Errors must be programmatically associated with fields.
- Switches and checkboxes need explicit labels.

## Related

- [Field](field.md)
