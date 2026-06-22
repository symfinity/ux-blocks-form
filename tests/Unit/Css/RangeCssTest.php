<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class RangeCssTest extends TestCase
{
    #[Test]
    public function nativeRangeTrackAndThumbSelectors(): void
    {
        $css = (string) file_get_contents(dirname(__DIR__, 3) . '/assets/styles/roles/range.css');

        self::assertStringContainsString('[data-ui-role="range"]::-webkit-slider-runnable-track', $css);
        self::assertStringContainsString('[data-ui-role="range"]::-moz-range-thumb', $css);
        self::assertStringContainsString('[data-ui-part="value-readout"]', $css);
        self::assertSame(substr_count($css, '{'), substr_count($css, '}'));
    }
}
