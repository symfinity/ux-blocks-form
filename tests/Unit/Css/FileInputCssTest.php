<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class FileInputCssTest extends TestCase
{
    private static function bundleCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/_bundle.css';
        self::assertFileExists($path);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function itUsesBootstrapStyleSingleShellFileButton(): void
    {
        $css = self::bundleCss();

        self::assertStringContainsString('[data-ui-role="file-input"]::file-selector-button', $css);
        self::assertStringContainsString('margin-inline-start: calc(-1 * var(--ui-space-sm))', $css);
        self::assertStringContainsString('border-inline-end: 1px solid var(--ui-color-border)', $css);
        self::assertStringContainsString('border-radius: 0', $css);
        self::assertStringContainsString('[data-ui-role="file-input"]:focus-within {', $css);
        self::assertStringNotContainsString('[data-ui-role="file-input"]:focus-within::file-selector-button {
outline: 0;
  box-shadow:', $css);
    }

    #[Test]
    public function itIncludesWebkitFileUploadButtonFallback(): void
    {
        $css = self::bundleCss();

        self::assertStringContainsString('::-webkit-file-upload-button', $css);
    }
}
