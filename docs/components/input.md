# Input

Single-line text field — email, password, search, and native HTML types.

## When to use

Collect one-line values in forms. Wrap with [Field](field.md) for label, hint, and error text. Use [FloatingField](floating-field.md) for floating-label layouts.

## Guidelines

**Do**

- Set `type` explicitly (`email`, `password`, `search`, …).
- Pair with `<twig:Label for="…">` or [Field](field.md) for accessible naming.
- Set `:invalid="true"` or `variant="danger"` when validation fails.

**Don't**

- Use `Input` for multi-line copy — use [Textarea](textarea.md).
- Omit labels for required fields.

## Usage

```twig
<twig:Field label="Email">
    <twig:Input name="email" type="email" placeholder="you@example.com" required />
</twig:Field>
```

Patterns align with [Bootstrap form controls](https://getbootstrap.com/docs/5.3/forms/form-control/) and [shadcn Input](https://ui.shadcn.com/docs/components/input).

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | `string` | `text` | HTML input type |
| `variant` | `string` | — | Semantic colour; auto `danger` when `invalid` |
| `placeholder` | `string?` | — | Placeholder text |
| `value` | `string?` | — | Controlled value |
| `invalid` | `bool` | `false` | Error styling |
| `disabled` | `bool` | `false` | Non-interactive |
| `icon` | `string?` | — | Start/end adornment |

Pass `name`, `id`, `required`, `aria-*`, and other native attributes on the tag.

## Accessibility

- Always expose an accessible name via label or `aria-label`.
- Do not use placeholder as the only label.
- Announce errors with [Field](field.md) `error` text linked by `aria-describedby`.

## Related

- [Field](field.md) · [FloatingField](floating-field.md) · [Textarea](textarea.md)
