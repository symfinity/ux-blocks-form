<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ExposesSemanticVariant;
use Symfinity\UxBlocksForm\Twig\Components\Concerns\ExposesToggleButtonChrome;
use Symfinity\UxBlocksForm\Twig\Components\Concerns\NormalizesSemanticColourVariant;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsTwigComponent('Checkbox', template: '@UxBlocksForm/components/Checkbox.html.twig')]
final class Checkbox
{
    use ExposesSemanticVariant;
    use ExposesToggleButtonChrome;
    use NormalizesSemanticColourVariant;

    /** @var 'control'|'button' */
    public string $appearance = 'control';

    public string $variant = 'primary';

    public string $label = '';

    public bool $checked = false;

    public bool $disabled = false;

    private static int $autoIdSequence = 0;

    #[PostMount]
    public function prepareToggleButtonMode(): void
    {
        if ('button' !== $this->appearance) {
            return;
        }

        if ('' === $this->id) {
            ++self::$autoIdSequence;
            $this->id = 'ui-checkbox-' . self::$autoIdSequence;
        }
    }
}
