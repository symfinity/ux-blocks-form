<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

/** 094 promoted layout roles now owned by form (110). */
final class FieldsetTest extends ComponentTestCase
{
    #[Test]
    public function itRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Fieldset');

        $this->assertRootAttributes($html, 'fieldset', 'blocks.fieldset');
    }

    #[Test]
    public function legendPropRendersAccessibleLegendElement(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Fieldset', ['legend' => 'Billing']);

        self::assertStringContainsString('<legend>Billing</legend>', $html);
    }
}
