<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class FileUploadCssTest extends TestCase
{
    use AssertsCssSelector;

    #[Test]
    public function hidesNativeInputAndStylesButtonTrigger(): void
    {
        $css = (string) file_get_contents(dirname(__DIR__, 3) . '/assets/styles/roles/file-upload.css');

        self::assertCssContains($css, '[data-ui-part="control"]');
        self::assertCssContains($css, '[data-ui-role="button"]');
        self::assertCssContains($css, '[data-ui-part="filename"]');
        self::assertCssContains($css, '[data-ui-part="filename-selected"]');
        self::assertSame(substr_count($css, '{'), substr_count($css, '}'));
    }
}
