<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ContainerRegionLayoutTest extends TestCase
{
    #[Test]
    public function fieldPositionsHeaderAndFooterParts(): void
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/field.css';
        self::assertFileExists($path);
        $css = (string) file_get_contents($path);

        self::assertStringContainsString('[data-ui-part="header"]', $css);
        self::assertStringContainsString('[data-ui-part="footer"]', $css);
    }
}
