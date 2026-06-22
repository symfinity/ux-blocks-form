<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class FileUploadTest extends ComponentTestCase
{
    #[Test]
    public function itRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('FileUpload', ['buttonLabel' => 'Pick file']);

        $this->assertRootAttributes($html, 'file-upload', 'blocks.file-upload');
        self::assertStringContainsString('type="file"', $html);
        self::assertStringContainsString('data-ui-role="button"', $html);
        self::assertStringContainsString('>Pick file<', $html);
    }

    #[Test]
    public function itRendersFilenameReadoutRegion(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('FileUpload', [
            'buttonLabel' => 'Attach',
            'required' => true,
        ]);

        self::assertStringContainsString('data-ui-part="filename"', $html);
        self::assertStringContainsString('data-ui-part="filename-empty"', $html);
        self::assertStringContainsString('data-ui-part="filename-selected"', $html);
        self::assertStringContainsString('required', $html);
    }
}
