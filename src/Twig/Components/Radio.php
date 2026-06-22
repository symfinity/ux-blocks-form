<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ExposesSemanticVariant;
use Symfinity\UxBlocksForm\Twig\Components\Concerns\NormalizesSemanticColourVariant;
use Symfinity\UxBlocksForm\Twig\Components\Concerns\ExposesToggleButtonChrome;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsTwigComponent('Radio', template: '@UxBlocksForm/components/Radio.html.twig')]
final class Radio
{
    use ExposesSemanticVariant;
    use ExposesToggleButtonChrome;
    use NormalizesSemanticColourVariant;

    /** @var 'control'|'button' */
    public string $appearance = 'control';

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
        if ('button' !== $this->appearance) {
            return;
        }

        if ('' === $this->id) {
            ++self::$autoIdSequence;
            $this->id = 'ui-radio-' . self::$autoIdSequence;
        }
    }
}
