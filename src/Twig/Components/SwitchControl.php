<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ExposesSemanticVariant;
use Symfinity\UxBlocksCore\Twig\NormalizesSemanticColourVariant;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Switch', template: '@UxBlocksForm/components/Switch.html.twig')]
final class SwitchControl
{
    use ExposesSemanticVariant;
    use NormalizesSemanticColourVariant;

    public string $variant = 'primary';

    public bool $checked = false;

    public bool $disabled = false;
}