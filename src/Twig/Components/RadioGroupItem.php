<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ExposesSemanticVariant;
use Symfinity\UxBlocksCore\Twig\NormalizesSemanticColourVariant;
use Symfinity\UxBlocksForm\Twig\Components\Concerns\ExposesToggleButtonChrome;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsTwigComponent('RadioGroup:Item', template: '@UxBlocksForm/components/RadioGroup/Item.html.twig')]
final class RadioGroupItem
{
    use ExposesSemanticVariant;
    use ExposesToggleButtonChrome;
    use NormalizesSemanticColourVariant;

    /** @var 'control'|'button'|'' */
    public string $appearance = '';

    public string $variant = 'primary';

    public string $label = '';

    public string $name = '';

    public string $value = '';

    public bool $checked = false;

    public bool $disabled = false;

    private static int $autoIdSequence = 0;

    #[PostMount]
    public function prepareToggleButtonMode(): void
    {
        if ('button' !== $this->resolvedAppearance()) {
            return;
        }

        if ('' === $this->id) {
            ++self::$autoIdSequence;
            $this->id = 'ui-radio-' . self::$autoIdSequence;
        }
    }

    public function resolvedAppearance(): string
    {
        if (\in_array($this->appearance, ['control', 'button'], true)) {
            return $this->appearance;
        }

        return 'control';
    }
}
