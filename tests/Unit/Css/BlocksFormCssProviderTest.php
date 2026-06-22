<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocksForm\Css\BlocksFormCssProvider;

final class BlocksFormCssProviderTest extends TestCase
{
    #[Test]
    public function itInlinesSplitRoleStylesheetsForWorkshopPreview(): void
    {
        $packageDir = \dirname(__DIR__, 3);
        $provider = new BlocksFormCssProvider($packageDir);
        $css = $provider->stylesheet();

        self::assertStringContainsString('[data-ui-role="input"][data-ui-variant="danger"]', $css);
        self::assertStringContainsString('[data-ui-part="input-adornment"]', $css);
        self::assertStringContainsString('[data-ui-role="field"]', $css);
        self::assertStringContainsString('[data-ui-role="checkbox"]', $css);
        self::assertSame(substr_count($css, '{'), substr_count($css, '}'), 'inlined form CSS must have balanced braces');
    }
}
