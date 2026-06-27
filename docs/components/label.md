# Label

Accessible caption for a form control.

## When to use

Accessible caption for a form control. Use **Label** when this pattern fits the screen — variant previews are below.

## Guidelines

**Do**

- Associate every control with a visible label.
- Use native `type` and validation attributes first.

**Don't**

- Rely on placeholder text instead of labels.
- Disable submit without explaining why.

## Usage

```twig
<twig:Label for="email">Email</twig:Label>
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
