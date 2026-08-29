<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig;

final class FieldA11yScopeHolder
{
    /** @var list<FieldA11yState> */
    private array $stack = [];

    public function push(FieldA11yState $state): void
    {
        $this->stack[] = $state;
    }

    public function pop(): void
    {
        if ([] === $this->stack) {
            return;
        }

        array_pop($this->stack);
    }

    public function current(): ?FieldA11yState
    {
        if ([] === $this->stack) {
            return null;
        }

        return $this->stack[array_key_last($this->stack)];
    }
}
