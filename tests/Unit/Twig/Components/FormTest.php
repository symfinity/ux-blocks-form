<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class FormTest extends ComponentTestCase
{
    #[Test]
    public function itRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Form', ['title' => 'Sign in', 'method' => 'post']);

        $this->assertRootAttributes($html, 'form', 'blocks.form');
        self::assertStringContainsString('<form', $html);
        self::assertStringContainsString('method="post"', $html);
        self::assertStringContainsString('data-ui-part="title"', $html);
        self::assertStringContainsString('Sign in', $html);
    }
}
