# FileInput

Native file picker.

## When to use

Native file picker. Use **FileInput** when this pattern fits the screen — variant previews are below.

## Guidelines

**Do**

- Associate every control with a visible label.
- Use native `type` and validation attributes first.

**Don't**

- Rely on placeholder text instead of labels.
- Disable submit without explaining why.

## Usage

```twig
<twig:FileInput name="avatar" />
```


## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| — | — | — | See Twig component class and package registry. |

## Accessibility

- Errors must be programmatically associated with fields.
- Switches and checkboxes need explicit labels.

## Related

- [FileUpload](file-upload.md)
