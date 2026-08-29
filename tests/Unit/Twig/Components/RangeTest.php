<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class RangeTest extends ComponentTestCase
{
    #[Test]
    public function itRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Range', ['min' => 0, 'max' => 100, 'value' => '50']);

        $this->assertRootAttributes($html, 'range', 'blocks.range');
        self::assertStringContainsString('type="range"', $html);
        self::assertStringContainsString('min="0"', $html);
        self::assertStringContainsString('max="100"', $html);
    }

    #[Test]
    public function showValueRendersAssociatedOutputReadout(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Range', [
            'min' => 0,
            'max' => 100,
            'value' => '50',
            'showValue' => true,
            'label' => 'Volume',
        ]);

        self::assertStringContainsString('data-ui-part="value-readout"', $html);
        self::assertStringContainsString('<output', $html);
        self::assertStringContainsString('>50<', $html);
        self::assertStringContainsString('for="ui-range-', $html);
    }
}
