# Fieldset

Grouped fields with legend.

## When to use

Grouped fields with legend. Use **Fieldset** when this pattern fits the screen — variant previews are below.

## Guidelines

**Do**

- Group related fields in Fieldset or Field compounds.
- Align FormActions with reading direction (end for LTR submit).

**Don't**

- Nest forms inside forms.
- Split one logical field across multiple unlabeled inputs.

## Usage

```twig
<twig:Fieldset legend="Address">…</twig:Fieldset>
```


## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| — | — | — | See Twig component class and package registry. |

## Accessibility

- Fieldset legends describe the group purpose.
- Surface validation summary for multi-field errors.

## Related

- [Field](field.md)
