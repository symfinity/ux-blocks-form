# FileUpload

Button-triggered upload with filename display.

## When to use

Button-triggered upload with filename display. Use **FileUpload** when this pattern fits the screen — variant previews are below.

## Guidelines

**Do**

- Group related fields in Fieldset or Field compounds.
- Align FormActions with reading direction (end for LTR submit).

**Don't**

- Nest forms inside forms.
- Split one logical field across multiple unlabeled inputs.

## Usage

```twig
<twig:FileUpload name="document" />
```


## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `disabled` | `string` | — | Component attribute |
| `invalid` | `string` | — | Component attribute |
| `buttonLabel` | `string?` | — | Slot or scalar content |

## Accessibility

- Fieldset legends describe the group purpose.
- Surface validation summary for multi-field errors.

## Related

- [FileInput](file-input.md)
