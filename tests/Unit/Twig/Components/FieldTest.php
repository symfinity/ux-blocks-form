<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class FieldTest extends ComponentTestCase
{
    #[Test]
    public function itRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Field');

        $this->assertRootAttributes($html, 'field', 'blocks.field');
    }

    #[Test]
    public function scalarRegionsOmitWhenEmpty(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Field');

        self::assertStringNotContainsString('data-ui-part="header"', $html);
        self::assertStringNotContainsString('data-ui-part="footer"', $html);
    }

    #[Test]
    public function scalarLabelRendersHeaderRegion(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Field', ['label' => 'Email']);

        self::assertStringContainsString('data-ui-part="header"', $html);
        self::assertStringContainsString('>Email<', $html);
        self::assertStringNotContainsString('data-ui-part="footer"', $html);
    }

    private function renderFieldWithInput(array $fieldData = [], array $inputData = ['type' => 'email']): string
    {
        self::bootKernel();

        return (string) self::getContainer()->get('twig')->createTemplate(
            '{% component "Field" with fieldData %}{% block content %}{{ component("Input", inputData) }}{% endblock %}{% endcomponent %}',
        )->render([
            'fieldData' => $fieldData,
            'inputData' => $inputData,
        ]);
    }

    #[Test]
    public function wiresLabelForAndControlIdOnNestedInput(): void
    {
        $html = $this->renderFieldWithInput(['label' => 'Email']);

        self::assertMatchesRegularExpression(
            '/<label[^>]+data-ui-part="header"[^>]+for="field-control-\d+"[^>]+id="field-label-\d+"/',
            $html,
        );
        self::assertMatchesRegularExpression('/<input[^>]+id="field-control-\d+"/', $html);
        self::assertMatchesRegularExpression('/<input[^>]+type="email"/', $html);
    }

    #[Test]
    public function wiresErrorDescribedByAndInvalidState(): void
    {
        $html = $this->renderFieldWithInput([
            'label' => 'Email',
            'error' => 'Email is required',
        ]);

        self::assertMatchesRegularExpression('/id="field-error-\d+"/', $html);
        self::assertMatchesRegularExpression('/<input[^>]+aria-describedby="field-error-\d+"/', $html);
        self::assertMatchesRegularExpression('/<input[^>]+aria-invalid="true"/', $html);
        self::assertStringContainsString('role="alert"', $html);
        self::assertStringContainsString('Email is required', $html);
    }

    #[Test]
    public function wiresHintDescribedByWithoutInvalidWhenOnlyHintPresent(): void
    {
        $html = $this->renderFieldWithInput([
            'label' => 'Email',
            'hint' => 'We never share your email.',
        ]);

        self::assertMatchesRegularExpression('/id="field-hint-\d+"/', $html);
        self::assertMatchesRegularExpression(
            '/<input[^>]+aria-describedby="field-hint-\d+"/',
            $html,
        );
        self::assertDoesNotMatchRegularExpression('/<input[^>]+aria-invalid="true"/', $html);
    }

    #[Test]
    public function invalidFlagWiresAriaInvalidWithoutErrorText(): void
    {
        $html = $this->renderFieldWithInput([
            'label' => 'Email',
            'invalid' => true,
        ]);

        self::assertMatchesRegularExpression('/<input[^>]+aria-invalid="true"/', $html);
        self::assertStringNotContainsString('data-ui-part="footer"', $html);
    }
}
