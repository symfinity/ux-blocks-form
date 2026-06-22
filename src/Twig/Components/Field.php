<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Field', template: '@UxBlocksForm/components/Field.html.twig')]
final class Field
{
    private static int $controlSequence = 0;

    private string $orientation = 'vertical';

    public ?string $label = null;

    public ?string $error = null;

    public ?string $hint = null;

    public bool $invalid = false;

    private string $controlId = '';

    private string $labelId = '';

    private string $errorId = '';

    private string $hintId = '';

    public function mount(
        string $orientation = 'vertical',
        string $controlId = '',
    ): void {
        if (\in_array($orientation, ['vertical', 'horizontal'], true)) {
            $this->orientation = $orientation;
        }

        if ('' === $controlId) {
            $this->controlId = 'field-control-' . (++self::$controlSequence);
        } else {
            $this->controlId = $controlId;
        }

        $suffix = str_starts_with($this->controlId, 'field-control-')
            ? substr($this->controlId, \strlen('field-control-'))
            : $this->controlId;

        $this->labelId = 'field-label-' . $suffix;
        $this->errorId = 'field-error-' . $suffix;
        $this->hintId = 'field-hint-' . $suffix;
    }

    #[ExposeInTemplate('orientation')]
    public function exposedOrientation(): string
    {
        return $this->orientation;
    }

    #[ExposeInTemplate('controlId')]
    public function exposedControlId(): string
    {
        return $this->controlId;
    }

    #[ExposeInTemplate('labelId')]
    public function exposedLabelId(): string
    {
        return $this->labelId;
    }

    #[ExposeInTemplate('errorId')]
    public function exposedErrorId(): string
    {
        return $this->errorId;
    }

    #[ExposeInTemplate('hintId')]
    public function exposedHintId(): string
    {
        return $this->hintId;
    }

    public function describedBy(): ?string
    {
        if (null !== $this->error && '' !== $this->error) {
            return $this->errorId;
        }

        if (null !== $this->hint && '' !== $this->hint) {
            return $this->hintId;
        }

        return null;
    }

    public function isControlInvalid(): bool
    {
        return $this->invalid || (null !== $this->error && '' !== $this->error);
    }
}
