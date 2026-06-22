<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('FloatingField', template: '@UxBlocksForm/components/FloatingField.html.twig')]
final class FloatingField
{
    public ?string $label = null;

    public ?string $error = null;

    public ?string $hint = null;

    public bool $invalid = false;

    private string $controlId = '';

    private string $labelId = '';

    private string $errorId = '';

    private string $hintId = '';

    public function mount(string $controlId = ''): void
    {
        if ('' === $controlId) {
            static $sequence = 0;
            $this->controlId = 'floating-control-' . (++$sequence);
        } else {
            $this->controlId = $controlId;
        }

        $suffix = str_starts_with($this->controlId, 'floating-control-')
            ? substr($this->controlId, \strlen('floating-control-'))
            : $this->controlId;

        $this->labelId = 'floating-label-' . $suffix;
        $this->errorId = 'floating-error-' . $suffix;
        $this->hintId = 'floating-hint-' . $suffix;
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
