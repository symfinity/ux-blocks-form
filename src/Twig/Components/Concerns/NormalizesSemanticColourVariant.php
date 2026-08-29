<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components\Concerns;

use Symfinity\UiKernel\Token\ColourPropsNormalizer;
use Symfony\UX\TwigComponent\Attribute\PostMount;

/**
 * @property string $variant
 */
trait NormalizesSemanticColourVariant
{
    #[PostMount]
    public function normalizeSemanticColourVariant(): void
    {
        $this->variant = ColourPropsNormalizer::withBuiltInTheme()->normalize($this->variant);

        if (\in_array($this->variant, ['', 'default', 'destructive', 'error'], true)) {
            throw new \InvalidArgumentException(sprintf(
                'Forbidden data-ui-variant emission "%s" from %s — use canonical names (danger not destructive).',
                '' === $this->variant ? '(empty)' : $this->variant,
                static::class,
            ));
        }
    }
}
