<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class RadioGroupTest extends ComponentTestCase
{
    #[Test]
    public function itRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('RadioGroup', ['orientation' => 'horizontal']);

        $this->assertRootAttributes($html, 'radio-group', 'blocks.radio-group');
        self::assertStringContainsString('role="radiogroup"', $html);
        self::assertStringContainsString('data-ui-orientation="horizontal"', $html);
    }

    #[Test]
    public function itemRendersRegistryAttributesAndName(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('RadioGroup:Item', [
            'name' => 'plan',
            'value' => 'annual',
            'checked' => true,
        ]);

        self::assertStringContainsString('data-ui-role="radio-group-item"', $html);
        self::assertStringContainsString('data-ui-role="radio"', $html);
        self::assertStringContainsString('data-ui-fragment="blocks.radio-group.item"', $html);
        self::assertStringContainsString('name="plan"', $html);
        self::assertStringContainsString('value="annual"', $html);
        self::assertStringContainsString('checked', $html);
    }

    #[Test]
    public function itRendersSegmentedButtonAppearanceGroup(): void
    {
        self::bootKernel();
        $html = $this->renderTwig(<<<'TWIG'
<twig:RadioGroup appearance="button" segmented ariaLabel="Plan options" name="plan">
    <twig:RadioGroup:Item appearance="button" name="plan" value="monthly" label="Monthly" id="plan-monthly" checked />
    <twig:RadioGroup:Item appearance="button" name="plan" value="annual" label="Annual" id="plan-annual" />
</twig:RadioGroup>
TWIG);

        self::assertStringContainsString('data-ui-role="button-group"', $html);
        self::assertStringContainsString('role="radiogroup"', $html);
        self::assertStringContainsString('aria-label="Plan options"', $html);
        self::assertStringContainsString('data-ui-appearance="button"', $html);
        self::assertStringContainsString('data-ui-role="button"', $html);
        self::assertStringContainsString('Monthly', $html);
        self::assertStringContainsString('Annual', $html);
    }

    #[Test]
    public function itemRendersButtonAppearance(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('RadioGroup:Item', [
            'appearance' => 'button',
            'name' => 'size',
            'value' => 'md',
            'label' => 'Medium',
            'id' => 'size-md',
            'variant' => 'secondary',
            'style' => 'outline',
            'checked' => true,
        ]);

        self::assertStringContainsString('data-ui-appearance="button"', $html);
        self::assertStringContainsString('data-ui-role="button"', $html);
        self::assertStringContainsString('data-ui-appearance="outline"', $html);
        self::assertStringContainsString('id="size-md"', $html);
        self::assertStringContainsString('for="size-md"', $html);
        self::assertStringContainsString('Medium', $html);
    }
}
