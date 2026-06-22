# Configuration

UX Blocks Form ships **no required app YAML**. The bundle prepends AssetMapper paths, Twig template paths, and UX Twig Component defaults at compile time.

## What the bundle configures

| Concern | Behavior |
|---------|----------|
| AssetMapper | Maps package `assets/` to logical namespace `ux-blocks-form` |
| Twig templates | Namespace `UxBlocksForm` → `templates/` |
| UX Twig components | `Symfinity\UxBlocksForm\Twig\Components\` → `components/` templates |
| Services | Autowired CSS provider and registry helpers |

Applications **do not** copy bundle `config/` into `config/packages/`.

## Optional app config

```yaml
# config/packages/symfinity_ux_blocks_form.yaml
symfinity_ux_blocks_form:
    fragment_ids: false
```

| Key | Default | Purpose |
|-----|---------|---------|
| `fragment_ids` | `false` | When `true`, emits `data-ui-fragment` on each role root from the package role registry |

Enable `fragment_ids` when your app or tests expect stable `blocks.*` fragment attributes on every instance.

## Routes

This package does not register public HTTP routes. Form components are rendered in your templates only.

## Stimulus and icons

Default form roles are **`nat`** — no package Stimulus controllers required. Optional:

- `symfony/ux-icons` for `Input` icon slots
- `symfinity/ux-blocks-core` for `Button` inside `InputGroup` and toggle-button labels

## See also

- [Installation](installation.md)
- [Components](components.md)
- [ui-kernel configuration](https://github.com/symfinity/ui-kernel/blob/main/docs/configuration.md)
