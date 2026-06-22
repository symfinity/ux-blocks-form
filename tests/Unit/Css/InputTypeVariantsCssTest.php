<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class InputTypeVariantsCssTest extends TestCase
{
    #[Test]
    public function coversSearchColorAndDatetimeLocal(): void
    {
        $css = (string) file_get_contents(dirname(__DIR__, 3) . '/assets/styles/roles/input-type-variants.css');

        self::assertStringContainsString('[type=search]', $css);
        self::assertStringContainsString('[type=color]', $css);
        self::assertStringContainsString('[type=datetime-local]', $css);
        self::assertSame(substr_count($css, '{'), substr_count($css, '}'));
    }
}
