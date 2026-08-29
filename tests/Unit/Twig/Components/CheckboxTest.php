<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;
use Symfinity\UxBlocksForm\Twig\Components\Checkbox;

final class CheckboxTest extends ComponentTestCase
{
    #[Test]
    public function itRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Checkbox', ['checked' => true]);

        $this->assertRootAttributes($html, 'checkbox', 'blocks.checkbox');
        self::assertStringContainsString('checked', $html);
    }

    #[Test]
    public function itRendersButtonAppearanceWithHiddenInputAndButtonLabel(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Checkbox', [
            'appearance' => 'button',
            'label' => 'Single toggle',
            'id' => 'toggle-a',
            'variant' => 'primary',
            'style' => 'solid',
            'checked' => true,
        ]);

        self::assertStringContainsString('data-ui-appearance="button"', $html);
        self::assertStringContainsString('id="toggle-a"', $html);
        self::assertStringContainsString('for="toggle-a"', $html);
        self::assertStringContainsString('data-ui-role="button"', $html);
        self::assertStringContainsString('data-ui-variant="primary"', $html);
        self::assertStringContainsString('Single toggle', $html);
        self::assertStringContainsString('type="checkbox"', $html);
    }

    #[Test]
    public function itRendersOutlineButtonAppearance(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Checkbox', [
            'appearance' => 'button',
            'label' => 'Outline toggle',
            'id' => 'toggle-outline',
            'style' => 'outline',
        ]);

        self::assertStringContainsString('data-ui-role="button"', $html);
        self::assertStringContainsString('data-ui-appearance="outline"', $html);
        self::assertStringContainsString('data-ui-appearance="button"', $html);
    }
}
