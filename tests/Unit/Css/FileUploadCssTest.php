<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class FileUploadCssTest extends TestCase
{
    #[Test]
    public function hidesNativeInputAndStylesButtonTrigger(): void
    {
        $css = (string) file_get_contents(dirname(__DIR__, 3) . '/assets/styles/roles/file-upload.css');

        self::assertStringContainsString('[data-ui-part="control"]', $css);
        self::assertStringContainsString('[data-ui-role="button"]', $css);
        self::assertStringContainsString('[data-ui-part="filename"]', $css);
        self::assertStringContainsString('[data-ui-part="filename-selected"]', $css);
        self::assertSame(substr_count($css, '{'), substr_count($css, '}'));
    }
}
