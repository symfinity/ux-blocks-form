<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('FormActions', template: '@UxBlocksForm/components/FormActions.html.twig')]
final class FormActions
{
    /** @var ''|'start'|'between'|'stretch' */
    public string $align = '';
}
