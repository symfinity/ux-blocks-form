<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class InputIconTest extends ComponentTestCase
{
    #[Test]
    public function startAdornmentWrapsInput(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Input', [
            'icon' => 'lucide:search',
            'iconPosition' => 'start',
            'placeholder' => 'Search',
        ]);

        self::assertStringContainsString('data-ui-part="input-adornment"', $html);
        self::assertStringContainsString('data-ui-icon-position="start"', $html);
        self::assertMatchesRegularExpression('/data-ui-part="icon"[\s\S]*data-ui-role="input"/', $html);
    }

    #[Test]
    public function endAdornmentRendersIconAfterInput(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Input', [
            'icon' => 'lucide:mail',
            'iconPosition' => 'end',
        ]);

        self::assertStringContainsString('data-ui-icon-position="end"', $html);
        self::assertMatchesRegularExpression('/data-ui-role="input"[\s\S]*data-ui-part="icon"/', $html);
    }

    #[Test]
    public function datetimeLocalAutoAppliesEndCalendarIconAdornment(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Input', ['type' => 'datetime-local']);

        self::assertStringContainsString('data-ui-part="input-adornment"', $html);
        self::assertStringContainsString('data-ui-icon-position="end"', $html);
        self::assertStringContainsString('type="datetime-local"', $html);
        self::assertMatchesRegularExpression('/data-ui-role="input"[\s\S]*data-ui-part="icon"/', $html);
    }

    #[Test]
    public function temporalIconCanBeDisabledExplicitly(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Input', ['type' => 'datetime-local', 'icon' => '']);

        self::assertStringNotContainsString('data-ui-part="input-adornment"', $html);
    }

    #[Test]
    public function withoutIconRendersBareInput(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Input', ['placeholder' => 'Plain']);

        self::assertStringNotContainsString('data-ui-part="input-adornment"', $html);
        self::assertStringContainsString('data-ui-role="input"', $html);
    }
}
