<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class FieldGroupHasTest extends TestCase
{
    use AssertsCssSelector;

    private static function roleCss(string $role): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/' . $role . '.css';
        self::assertFileExists($path, $role);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function fieldShellReactsToInvalidAndFocusVisible(): void
    {
        $css = self::roleCss('field');

        self::assertStringContainsString(':has(:invalid)', $css);
        self::assertStringContainsString(':has(:focus-visible)', $css);
    }

    #[Test]
    public function inputGroupShellReactsToInvalidAndFocusVisibleOnInnerInput(): void
    {
        $css = self::roleCss('input-group');

        self::assertCssContains($css, ':has(:invalid) [data-ui-role="input"]');
        self::assertCssContains($css, ':has(:focus-visible) [data-ui-role="input"]');
    }

    #[Test]
    public function fieldsetShellReactsToInvalidAndFocusVisible(): void
    {
        $css = self::roleCss('fieldset');

        self::assertStringContainsString(':has(:invalid)', $css);
        self::assertStringContainsString(':has(:focus-visible)', $css);
    }
}
