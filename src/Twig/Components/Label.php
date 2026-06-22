<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Label', template: '@UxBlocksForm/components/Label.html.twig')]
final class Label
{
    public ?string $for = null;
}
