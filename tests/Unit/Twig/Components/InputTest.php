<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;
use Symfinity\UxBlocksForm\Twig\Components\Input;

final class InputTest extends ComponentTestCase
{
    #[Test]
    public function itRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Input', ['invalid' => true, 'disabled' => true]);

        $this->assertRootAttributes($html, 'input', 'blocks.input');
        self::assertStringContainsString('aria-invalid="true"', $html);
        self::assertStringContainsString('disabled', $html);
    }

    #[Test]
    public function itRendersPlaceholderWhenSet(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Input', ['placeholder' => 'you@example.com']);

        self::assertStringContainsString('placeholder="you@example.com"', $html);
    }
}
