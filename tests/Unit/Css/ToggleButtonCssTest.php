<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ToggleButtonCssTest extends TestCase
{
    private static function roleCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/toggle-button.css';
        self::assertFileExists($path);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function itHidesNativeToggleInputs(): void
    {
        $css = self::roleCss();

        self::assertStringContainsString('[data-ui-role="checkbox"][data-ui-appearance="button"]', $css);
        self::assertStringContainsString('[data-ui-role="radio"][data-ui-appearance="button"]', $css);
        self::assertStringContainsString('clip: rect(0, 0, 0, 0)', $css);
    }

    #[Test]
    public function itStylesCheckedOutlineLabels(): void
    {
        $css = self::roleCss();

        self::assertStringContainsString(
            '[data-ui-appearance="button"]:checked + [data-ui-role="button"][data-ui-variant="primary"][data-ui-appearance="outline"]',
            $css,
        );
        self::assertStringContainsString('background: var(--ui-color-primary)', $css);
    }

    #[Test]
    public function itDemotesUncheckedSolidLabelsToOutlineChrome(): void
    {
        $css = self::roleCss();

        self::assertStringContainsString(
            '[data-ui-appearance="button"]:not(:checked):not(:disabled) + [data-ui-role="button"][data-ui-variant="primary"][data-ui-appearance="solid"]',
            $css,
        );
        self::assertStringContainsString('background: transparent', $css);
    }

    #[Test]
    public function itEmphasizesCheckedSolidLabels(): void
    {
        $css = self::roleCss();

        self::assertStringContainsString(
            '[data-ui-appearance="button"]:checked + [data-ui-role="button"][data-ui-appearance="solid"]',
            $css,
        );
        self::assertStringContainsString('box-shadow: inset', $css);
    }

    #[Test]
    public function itHasBalancedBraces(): void
    {
        $css = self::roleCss();

        self::assertSame(substr_count($css, '{'), substr_count($css, '}'));
    }

    #[Test]
    public function coreButtonGroupUsesVisibleButtonSiblingSelectors(): void
    {
        $ref = new \ReflectionClass(\Symfinity\UxBlocksCore\SymfinityUxBlocksCoreBundle::class);
        $path = \dirname($ref->getFileName(), 2) . '/assets/styles/roles/button-group.css';
        if (!is_file($path)) {
            self::markTestSkipped('symfinity/ux-blocks-core button-group.css is not available in this install.');
        }

        $css = (string) file_get_contents($path);

        self::assertStringContainsString('[data-ui-role=button] ~ [data-ui-role=button]', $css);
        self::assertStringContainsString(':not(:last-of-type)', $css);
        self::assertStringNotContainsString(':not(:first-child)', $css);
    }
}
