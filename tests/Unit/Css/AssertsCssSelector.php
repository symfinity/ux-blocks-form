<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

trait AssertsCssSelector
{
    protected static function assertCssContains(string $css, string $needle, string $message = ''): void
    {
        self::assertStringContainsString(
            self::normalizeCssAttributeQuotes($needle),
            self::normalizeCssAttributeQuotes($css),
            $message !== '' ? $message : ('Expected CSS to contain: ' . $needle),
        );
    }

    protected static function assertCssNotContains(string $css, string $needle, string $message = ''): void
    {
        self::assertStringNotContainsString(
            self::normalizeCssAttributeQuotes($needle),
            self::normalizeCssAttributeQuotes($css),
            $message !== '' ? $message : ('Expected CSS not to contain: ' . $needle),
        );
    }

    private static function normalizeCssAttributeQuotes(string $css): string
    {
        return (string) preg_replace('/\[([^\]=\[]+)=["\']([^"\']+)["\']\]/', '[$1=$2]', $css);
    }
}
