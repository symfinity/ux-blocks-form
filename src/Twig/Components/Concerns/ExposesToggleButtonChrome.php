<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components\Concerns;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

/**
 * Label chrome for {@see appearance}="button" (091 matrix on {@code data-ui-role="button"}).
 *
 * @property string $appearance control|button
 * @property string $style      solid|outline|link — maps to label {@code data-ui-appearance}
 * @property string $size
 * @property string $id
 */
trait ExposesToggleButtonChrome
{
    use NormalizesControlSize;

    /** @var 'solid'|'outline'|'link' */
    public string $style = 'solid';

    public string $size = 'md';

    public string $id = '';

    #[ExposeInTemplate('is_button_appearance')]
    public function isButtonAppearance(): bool
    {
        /** @var string $appearance */
        $appearance = $this->appearance;

        return 'button' === $appearance;
    }

    #[ExposeInTemplate('label_button_style')]
    public function labelButtonStyle(): string
    {
        return \in_array($this->style, ['solid', 'outline', 'link'], true) ? $this->style : 'solid';
    }
}
