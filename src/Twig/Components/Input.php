<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components;

use Symfinity\UiKernel\Token\ColourPropsNormalizer;
use Symfinity\UxBlocksCore\Twig\ResolvesExplicitIcon;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsTwigComponent('Input', template: '@UxBlocksForm/components/Input.html.twig')]
final class Input
{
    use ResolvesExplicitIcon;

    /** @var list<string> */
    private const TEMPORAL_TYPES = ['date', 'datetime-local', 'time', 'month', 'week'];

    public string $type = 'text';

    public string $variant = '';

    public ?string $value = null;

    public ?string $placeholder = null;

    public bool $invalid = false;

    public bool $disabled = false;

    public string $iconPosition = 'start';

    #[PostMount]
    public function syncInputValidationVariant(): void
    {
        if ('' === $this->variant && $this->invalid) {
            $this->variant = 'danger';
        }

        if ('' !== $this->variant) {
            $this->variant = ColourPropsNormalizer::withBuiltInTheme()->normalize($this->variant);
        }
    }

    #[ExposeInTemplate('resolved_input_icon')]
    public function resolvedInputIcon(): ?string
    {
        return $this->resolveExplicitIcon($this->defaultTemporalIcon());
    }

    #[ExposeInTemplate('input_icon_position')]
    public function inputIconPosition(): string
    {
        if ($this->usesAutoTemporalIconAdornment()) {
            return 'end';
        }

        return \in_array($this->iconPosition, ['start', 'end'], true) ? $this->iconPosition : 'start';
    }

    private function usesAutoTemporalIconAdornment(): bool
    {
        if (!\in_array($this->type, self::TEMPORAL_TYPES, true)) {
            return false;
        }

        if ('' === $this->icon) {
            return false;
        }

        return null === $this->icon;
    }

    private function defaultTemporalIcon(): ?string
    {
        if (!\in_array($this->type, self::TEMPORAL_TYPES, true) || '' === $this->icon) {
            return null;
        }

        return match ($this->type) {
            'time' => 'lucide:clock',
            default => 'lucide:calendar',
        };
    }
}
