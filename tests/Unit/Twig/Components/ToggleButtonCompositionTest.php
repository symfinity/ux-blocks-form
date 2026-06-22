<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class ToggleButtonCompositionTest extends ComponentTestCase
{
    #[Test]
    public function segmentedRadioUsesConnectedButtonGroupLabels(): void
    {
        self::bootKernel();
        $html = $this->renderTwig(<<<'TWIG'
<twig:RadioGroup appearance="button" segmented ariaLabel="Segmented options" name="seg">
    <twig:RadioGroup:Item appearance="button" name="seg" value="one" label="One" id="seg-one" variant="secondary" style="solid" checked />
    <twig:RadioGroup:Item appearance="button" name="seg" value="two" label="Two" id="seg-two" variant="secondary" style="solid" />
    <twig:RadioGroup:Item appearance="button" name="seg" value="three" label="Three" id="seg-three" variant="secondary" style="solid" />
</twig:RadioGroup>
TWIG);

        self::assertStringContainsString('data-ui-role="button-group"', $html);
        self::assertSame(3, substr_count($html, 'data-ui-role="button"'));
        self::assertStringContainsString('name="seg"', $html);
        self::assertStringContainsString('type="radio"', $html);
    }
}
