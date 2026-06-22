<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Twig\Components;

use LogicException;
use PHPUnit\Framework\Attributes\Test;
use Twig\Error\RuntimeError;

final class FloatingFieldTest extends ComponentTestCase
{
    #[Test]
    public function itRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('FloatingField', ['label' => 'Email']);

        $this->assertRootAttributes($html, 'floating-field', 'blocks.floating-field');
        self::assertStringContainsString('data-ui-part="label"', $html);
    }

    #[Test]
    public function wiresNestedInputControlId(): void
    {
        self::bootKernel();
        $html = (string) self::getContainer()->get('twig')->createTemplate(
            '{% component "FloatingField" with { label: "Email" } %}{% block content %}{{ component("Input", { placeholder: " " }) }}{% endblock %}{% endcomponent %}',
        )->render([]);

        self::assertMatchesRegularExpression('/<input[^>]+id="floating-control-\d+"/', $html);
        self::assertMatchesRegularExpression('/<label[^>]+for="floating-control-\d+"/', $html);
    }

    #[Test]
    public function selectChildIsForbidden(): void
    {
        self::bootKernel();

        try {
            $this->renderTwig(<<<'TWIG'
{% component "FloatingField" with { label: "Country" } %}
    {% block content %}{{ component("Select", { placeholder: "Choose a country" }) }}{% endblock %}
{% endcomponent %}
TWIG);
            self::fail('Expected render to fail when FloatingField wraps Select.');
        } catch (RuntimeError $error) {
            self::assertInstanceOf(LogicException::class, $error->getPrevious());
            self::assertStringContainsString('FloatingField MUST NOT wrap Select', $error->getPrevious()?->getMessage() ?? '');
        }
    }
}
