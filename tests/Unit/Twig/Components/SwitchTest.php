<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class SwitchTest extends ComponentTestCase
{
    #[Test]
    public function itRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Switch', ['checked' => true]);

        $this->assertRootAttributes($html, 'switch', 'blocks.switch');
    }

    #[Test]
    public function switchRendersDisabledState(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Switch', ['checked' => true, 'disabled' => true]);

        self::assertStringContainsString('data-ui-state="disabled"', $html);
        self::assertStringContainsString('disabled', $html);
    }

    #[Test]
    public function switchNormalizesLegacyColourAliasesInMarkup(): void
    {
        self::bootKernel();

        $destructive = $this->renderComponent('Switch', ['variant' => 'destructive', 'checked' => true]);
        self::assertStringContainsString('data-ui-variant="danger"', $destructive);
        self::assertStringNotContainsString('data-ui-variant="destructive"', $destructive);

        $default = $this->renderComponent('Switch', ['variant' => 'default', 'checked' => true]);
        self::assertStringContainsString('data-ui-variant="primary"', $default);
        self::assertStringNotContainsString('data-ui-variant="default"', $default);
    }
}
