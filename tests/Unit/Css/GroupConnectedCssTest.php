<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class GroupConnectedCssTest extends TestCase
{
    use AssertsCssSelector;

    private static function roleCss(string $role): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/' . $role . '.css';
        self::assertFileExists($path, $role);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function inputGroupConnectsAdjacentControls(): void
    {
        $css = self::roleCss('input-group');

        self::assertCssContains($css, '[data-ui-role="input-group"] > :not(:first-child)');
        self::assertStringContainsString('margin-inline-start: -1px', $css);
        self::assertCssContains($css, '[data-ui-role="input-group"] > [data-ui-role="input"]');
        self::assertStringContainsString('flex: 1 1 auto', $css);
    }
}
