<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('RadioGroup', template: '@UxBlocksForm/components/RadioGroup.html.twig')]
final class RadioGroup
{
    public string $name = '';

    /** @var 'vertical'|'horizontal' */
    public string $orientation = 'vertical';

    /** @var 'control'|'button' */
    public string $appearance = 'control';

    public bool $segmented = false;

    public string $ariaLabel = '';

    #[ExposeInTemplate('is_segmented_button_group')]
    public function isSegmentedButtonGroup(): bool
    {
        return $this->segmented && 'button' === $this->appearance;
    }
}
