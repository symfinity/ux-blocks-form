<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

/** 094 promoted layout roles now owned by form (110). */
final class InputGroupTest extends ComponentTestCase
{
    #[Test]
    public function itRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('InputGroup');

        $this->assertRootAttributes($html, 'input-group', 'blocks.input-group');
    }
}
