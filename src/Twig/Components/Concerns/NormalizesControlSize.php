<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components\Concerns;

use Symfony\UX\TwigComponent\Attribute\PostMount;

/**
 * @property string $size
 */
trait NormalizesControlSize
{
    #[PostMount]
    public function normalizeControlSize(): void
    {
        if ('default' === $this->size) {
            $this->size = 'md';
        }
    }
}
