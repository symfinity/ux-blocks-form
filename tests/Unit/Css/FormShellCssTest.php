<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class FormShellCssTest extends TestCase
{
    #[Test]
    public function formAndActionsLayoutRules(): void
    {
        $css = (string) file_get_contents(dirname(__DIR__, 3) . '/assets/styles/roles/form.css');

        self::assertStringContainsString('[data-ui-role="form"]', $css);
        self::assertStringContainsString('[data-ui-role="form-actions"]', $css);
        self::assertSame(substr_count($css, '{'), substr_count($css, '}'));
    }
}
