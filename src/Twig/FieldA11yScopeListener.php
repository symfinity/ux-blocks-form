<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig;

use Symfinity\UxBlocksForm\Twig\Components\Field;
use Symfinity\UxBlocksForm\Twig\Components\FloatingField;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\UX\TwigComponent\Event\PostRenderEvent;
use Symfony\UX\TwigComponent\Event\PreRenderEvent;

#[AsEventListener(event: PreRenderEvent::class, method: 'onPreRender')]
#[AsEventListener(event: PostRenderEvent::class, method: 'onPostRender')]
final class FieldA11yScopeListener
{
    public function __construct(
        private readonly FieldA11yScopeHolder $scopeHolder,
    ) {
    }

    public function onPreRender(PreRenderEvent $event): void
    {
        $component = $event->getComponent();
        if (!$component instanceof Field && !$component instanceof FloatingField) {
            return;
        }

        $this->scopeHolder->push(new FieldA11yState(
            controlId: $component->exposedControlId(),
            describedBy: $component->describedBy(),
            invalid: $component->isControlInvalid(),
            compoundRole: $component instanceof FloatingField ? 'floating-field' : 'field',
        ));
    }

    public function onPostRender(PostRenderEvent $event): void
    {
        $root = $event->getMountedComponent()->getComponent();
        if (!$root instanceof Field && !$root instanceof FloatingField) {
            return;
        }

        $this->scopeHolder->pop();
    }
}
