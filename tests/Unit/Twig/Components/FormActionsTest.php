<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class FormActionsTest extends ComponentTestCase
{
    #[Test]
    public function itRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('FormActions', ['align' => 'stretch']);

        $this->assertRootAttributes($html, 'form-actions', 'blocks.form-actions');
        self::assertStringContainsString('data-ui-align="stretch"', $html);
    }
}
