<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class FloatingFieldCssTest extends TestCase
{
    #[Test]
    public function labelFloatsOnFocusOrValue(): void
    {
        $css = (string) file_get_contents(dirname(__DIR__, 3) . '/assets/styles/roles/floating-field.css');

        self::assertStringContainsString(':not(:placeholder-shown)', $css);
        self::assertStringContainsString('[data-ui-part="label"]', $css);
        self::assertStringContainsString('grid-row: 1', $css);
        self::assertStringContainsString('grid-row: 2', $css);
        self::assertStringNotContainsString('top: 50%', $css);
        self::assertStringNotContainsString('select-control', $css);
        self::assertSame(substr_count($css, '{'), substr_count($css, '}'));
    }
}
