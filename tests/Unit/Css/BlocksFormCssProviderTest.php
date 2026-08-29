<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocksForm\Css\BlocksFormCssProvider;

final class BlocksFormCssProviderTest extends TestCase
{
    use AssertsCssSelector;

    #[Test]
    public function itInlinesSplitRoleStylesheetsForWorkshopPreview(): void
    {
        $packageDir = \dirname(__DIR__, 3);
        $provider = new BlocksFormCssProvider($packageDir);
        $css = $provider->stylesheet();

        self::assertCssContains($css, '[data-ui-role="input"][data-ui-variant="danger"]');
        self::assertCssContains($css, '[data-ui-part="input-adornment"]');
        self::assertCssContains($css, '[data-ui-role="field"]');
        self::assertCssContains($css, '[data-ui-role="checkbox"]');
        self::assertSame(substr_count($css, '{'), substr_count($css, '}'), 'inlined form CSS must have balanced braces');
    }
}
