# Quick start

Use UX Blocks Form components in a Symfony app with ui-kernel theme CSS and ux-blocks-core primitives.

## Prerequisites

[Installation](installation.md) completed — `symfinity/ux-blocks-form` installed (includes `symfinity/ux-blocks-core`). Add **`symfinity/ui-kernel`** for theme CSS if you do not already use it:

```bash
composer require symfinity/ui-kernel
```

## 1. Include ui-kernel CSS

Form role CSS reads ui-kernel design tokens. In your base layout `<head>`:

```twig
{# templates/base.html.twig #}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{% block title %}My app{% endblock %}</title>
    {{ ui_kernel_theme_boot_script() }}
    {{ ui_kernel_css()|raw }}
    {% block stylesheets %}{% endblock %}
</head>
<body>
    {% block body %}{% endblock %}
</body>
</html>
```

Minimal ui-kernel app config:

```yaml
# config/packages/symfinity_ui_kernel.yaml
symfinity_ui_kernel:
    default_theme: default
    default_variant: default
    schema_version: '1.0'
```

## 2. Build a form layout

```twig
{# templates/account/register.html.twig #}
<twig:Form title="Create account" method="post" action="{{ path('app_register') }}">
    <twig:Field label="Email" hint="We never share your email.">
        <twig:Input name="email" type="email" placeholder="you@example.com" required />
    </twig:Field>

    <twig:Field label="Password" :invalid="errors.password is defined" :error="errors.password ?? null">
        <twig:Input name="password" type="password" required />
    </twig:Field>

    <twig:FormActions align="end">
        <twig:Button type="submit">Sign up</twig:Button>
    </twig:FormActions>
</twig:Form>
```

## 3. Toggle buttons and selects

```twig
<twig:RadioGroup name="plan" appearance="button" variant="primary">
    <twig:Radio value="free" label="Free" checked />
    <twig:Radio value="pro" label="Pro" />
</twig:RadioGroup>

<twig:Field label="Country">
    <twig:Select name="country" placeholder="Choose a country">
        <option value="de">Germany</option>
        <option value="at">Austria</option>
    </twig:Select>
</twig:Field>
```

Use `FloatingField` for floating labels on text inputs only — wrap `Input` or `Textarea`, not `Select`.

## Optional Symfony Form bridge

For `FormView` integration and field widgets:

```bash
composer require symfinity/form-ui-extensions-bundle
```

See the [form-ui-extensions-bundle](https://github.com/symfinity/form-ui-extensions-bundle) handbook for theme wiring.

## Next steps

- [Components](components.md) — full role inventory
- [Configuration](configuration.md) — optional `fragment_ids` setting

## See also

- [CHANGELOG](https://github.com/symfinity/ux-blocks-form/blob/main/CHANGELOG.md)
- [Contributing](https://github.com/symfinity/ux-blocks-form/blob/main/CONTRIBUTING.md)
- [GitHub Issues](https://github.com/symfinity/ux-blocks-form/issues)
