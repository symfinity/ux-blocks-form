<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class InputTemporalIconAdornmentCssTest extends TestCase
{
    #[Test]
    public function endIconReplacesNativeTemporalPickerIndicator(): void
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/input-adornment.css';
        self::assertFileExists($path);

        $css = (string) file_get_contents($path);

        self::assertStringContainsString('[type=date]::-webkit-calendar-picker-indicator', $css);
        self::assertStringContainsString('[type=datetime-local]::-webkit-calendar-picker-indicator', $css);
        self::assertStringContainsString('pointer-events: none', $css);
        self::assertStringContainsString('opacity: 0', $css);
        self::assertSame(substr_count($css, '{'), substr_count($css, '}'), 'input-adornment CSS must have balanced braces');
    }
}
