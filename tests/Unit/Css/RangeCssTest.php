<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class RangeCssTest extends TestCase
{
    use AssertsCssSelector;

    #[Test]
    public function nativeRangeTrackAndThumbSelectors(): void
    {
        $css = (string) file_get_contents(dirname(__DIR__, 3) . '/assets/styles/roles/range.css');

        self::assertCssContains($css, '[data-ui-role="range"]::-webkit-slider-runnable-track');
        self::assertCssContains($css, '[data-ui-role="range"]::-moz-range-thumb');
        self::assertCssContains($css, '[data-ui-part="value-readout"]');
        self::assertSame(substr_count($css, '{'), substr_count($css, '}'));
    }
}
