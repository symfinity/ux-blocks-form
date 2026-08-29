<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig;

use Symfinity\UxBlocksForm\Css\BlocksFormCssProvider;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class BlocksFormStylesExtension extends AbstractExtension
{
    public function __construct(
        private readonly BlocksFormCssProvider $cssProvider,
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('ux_blocks_form_stylesheet', $this->cssProvider->stylesheet(...), ['is_safe' => ['html']]),
        ];
    }
}
