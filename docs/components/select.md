# Select

Native dropdown for choosing one (or more) options from a list.

## When to use

Short, familiar option lists where native OS pickers are acceptable. For searchable or creatable lists, use extended-tier combobox patterns.

## Guidelines

**Do**

- Wrap with [Field](field.md) or [Label](label.md) for accessible naming.
- Use `multiple` only when users truly need more than one value.
- Prefer plain language in `<option>` text.

**Don't**

- Use Select for two choices — consider [RadioGroup](radio-group.md).
- Omit an empty placeholder option when no value is selected yet.

## Usage

```twig
<twig:Field label="Country">
    <twig:Select name="country">
        <option value="">Choose…</option>
        <option value="de">Germany</option>
        <option value="at">Austria</option>
    </twig:Select>
</twig:Field>
```

Aligned with [Bootstrap selects](https://getbootstrap.com/docs/5.3/forms/select/).

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | `string` | — | Semantic colour when invalid |
| `invalid` | `bool` | `false` | Error styling |
| `disabled` | `bool` | `false` | Non-interactive |

Default slot: `<option>` elements. Pass `name`, `id`, `multiple`, and native attributes on the tag.

## Accessibility

- Expose a visible label; do not rely on the first option as the label.
- Announce validation errors via [Field](field.md) helper text.

## Related

- [Field](field.md) · [RadioGroup](radio-group.md)
