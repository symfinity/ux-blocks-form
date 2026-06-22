<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ExposesSemanticVariant;
use Symfinity\UxBlocksCore\Twig\NormalizesSemanticColourVariant;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsTwigComponent('Range', template: '@UxBlocksForm/components/Range.html.twig')]
final class Range
{
    use ExposesSemanticVariant;
    use NormalizesSemanticColourVariant;

    public string $variant = 'primary';

    public ?string $value = null;

    public ?string $min = null;

    public ?string $max = null;

    public ?string $step = null;

    public bool $disabled = false;

    public bool $showValue = false;

    public ?string $label = null;

    public string $id = '';

    private static int $autoIdSequence = 0;

    #[PostMount]
    public function assignControlId(): void
    {
        if ('' === $this->id) {
            ++self::$autoIdSequence;
            $this->id = 'ui-range-' . self::$autoIdSequence;
        }
    }
}
