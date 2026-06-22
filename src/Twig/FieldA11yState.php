<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig;

final readonly class FieldA11yState
{
    /** @param 'field'|'floating-field' $compoundRole */
    public function __construct(
        public string $controlId,
        public ?string $describedBy,
        public bool $invalid,
        public string $compoundRole = 'field',
    ) {
    }
}
