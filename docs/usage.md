# Usage

Patterns for **symfinity/ux-blocks-form** controls.

## Featured components

- **[Input](components/input.md)** — text, email, search fields
- **[FloatingField](components/floating-field.md)** — floating label wrapper
- **[Field](components/field.md)** — label, hint, and error compound

## Typical field row

```twig
<twig:Field label="Email" hint="We never share your email.">
    <twig:Input name="email" type="email" required />
</twig:Field>
```

Use **Form** and **FormActions** for full page forms — see [Components](components.md).

## Buttons

**Button** and **ButtonGroup** live in [symfinity/ux-blocks-core](https://packagist.org/packages/symfinity/ux-blocks-core).

## Symfony Form bridge

For `FormView` theming, add [form-ui-extensions-bundle](https://packagist.org/packages/symfinity/form-ui-extensions-bundle).

## See also

- [Quick start](quickstart.md) · [Configuration](configuration.md) · [Upgrade](upgrade.md)
