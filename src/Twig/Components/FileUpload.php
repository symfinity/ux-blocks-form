<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components;

use Symfinity\UiKernel\Token\ColourPropsNormalizer;
use Symfinity\UxBlocksCore\Twig\ExposesSemanticVariant;
use Symfinity\UxBlocksCore\Twig\NormalizesSemanticColourVariant;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsTwigComponent('FileUpload', template: '@UxBlocksForm/components/FileUpload.html.twig')]
final class FileUpload
{
    use ExposesSemanticVariant;
    use NormalizesSemanticColourVariant;

    public string $variant = 'primary';

    public string $buttonLabel = 'Choose file';

    public bool $multiple = false;

    public bool $invalid = false;

    public bool $disabled = false;

    public bool $required = false;

    public string $accept = '';

    public string $id = '';

    private static int $autoIdSequence = 0;

    #[PostMount]
    public function assignControlId(): void
    {
        if ('' === $this->id) {
            ++self::$autoIdSequence;
            $this->id = 'ui-file-upload-' . self::$autoIdSequence;
        }
    }

    #[ExposeInTemplate('normalized_variant')]
    public function normalizedVariant(): string
    {
        return ColourPropsNormalizer::withBuiltInTheme()->normalize($this->variant);
    }
}
