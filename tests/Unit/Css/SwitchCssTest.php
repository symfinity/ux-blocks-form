<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class SwitchCssTest extends TestCase
{
    use AssertsCssSelector;

    private static function roleCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/switch.css';
        self::assertFileExists($path);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function itInsetsTrackOnePixelFromBorder(): void
    {
        $css = self::roleCss();

        self::assertCssContains($css, '[data-ui-role="switch"]');
        self::assertStringContainsString('--switch-track-inset: 1px', $css);
        self::assertStringContainsString('background-clip: content-box, content-box, padding-box', $css);
        self::assertStringContainsString('--ui-switch-ring:', $css);
    }

    #[Test]
    public function itHasBalancedBraces(): void
    {
        $css = self::roleCss();

        self::assertSame(substr_count($css, '{'), substr_count($css, '}'));
    }
}
