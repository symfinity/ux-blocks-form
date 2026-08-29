<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Fieldset', template: '@UxBlocksForm/components/Fieldset.html.twig')]
final class Fieldset
{
    public ?string $legend = null;
}