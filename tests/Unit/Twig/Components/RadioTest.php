<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class RadioTest extends ComponentTestCase
{
    #[Test]
    public function itRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Radio', [
            'name' => 'plan',
            'value' => 'pro',
            'label' => 'Pro',
            'checked' => true,
        ]);

        $this->assertRootAttributes($html, 'radio', 'blocks.radio');
        self::assertStringContainsString('type="radio"', $html);
        self::assertStringContainsString('name="plan"', $html);
        self::assertStringContainsString('value="pro"', $html);
        self::assertStringContainsString('>Pro<', $html);
    }

    #[Test]
    public function itRendersButtonAppearanceWithHiddenInputAndButtonLabel(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Radio', [
            'appearance' => 'button',
            'label' => 'Pro plan',
            'id' => 'radio-pro',
            'name' => 'plan',
            'value' => 'pro',
            'variant' => 'primary',
            'style' => 'solid',
            'checked' => true,
        ]);

        self::assertStringContainsString('data-ui-appearance="button"', $html);
        self::assertStringContainsString('id="radio-pro"', $html);
        self::assertStringContainsString('for="radio-pro"', $html);
        self::assertStringContainsString('data-ui-role="button"', $html);
        self::assertStringContainsString('data-ui-variant="primary"', $html);
        self::assertStringContainsString('Pro plan', $html);
        self::assertStringContainsString('type="radio"', $html);
    }
}
