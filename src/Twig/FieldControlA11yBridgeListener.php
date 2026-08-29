<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig;

use LogicException;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\UX\TwigComponent\ComponentAttributes;
use Symfony\UX\TwigComponent\Event\PreRenderEvent;

#[AsEventListener(event: PreRenderEvent::class, method: 'onPreRender', priority: -10)]
final class FieldControlA11yBridgeListener
{
    /** @var list<string> */
    private const CONTROL_TWIG_NAMES = [
        'Input',
        'Checkbox',
        'Textarea',
        'Select',
        'FileInput',
        'Switch',
        'Range',
    ];

    public function __construct(
        private readonly FieldA11yScopeHolder $scopeHolder,
    ) {
    }

    public function onPreRender(PreRenderEvent $event): void
    {
        if (!\in_array($event->getMetadata()->getName(), self::CONTROL_TWIG_NAMES, true)) {
            return;
        }

        $state = $this->scopeHolder->current();
        if (null === $state) {
            return;
        }

        if ('Select' === $event->getMetadata()->getName() && 'floating-field' === $state->compoundRole) {
            throw new LogicException(
                'FloatingField MUST NOT wrap Select. Use <twig:Field label="…"><twig:Select …></twig:Select></twig:Field> or <twig:Select label="…"> instead.',
            );
        }

        $variables = $event->getVariables();
        $attributesVar = $event->getMetadata()->getAttributesVar();
        $attributes = $variables[$attributesVar] ?? null;
        if (!$attributes instanceof ComponentAttributes) {
            return;
        }

        $defaults = [];
        if (!$attributes->has('id')) {
            $defaults['id'] = $state->controlId;
        }

        if (null !== $state->describedBy && !$attributes->has('aria-describedby')) {
            $defaults['aria-describedby'] = $state->describedBy;
        }

        if ($state->invalid && !$attributes->has('aria-invalid')) {
            $defaults['aria-invalid'] = 'true';
        }

        if ([] === $defaults) {
            return;
        }

        $variables[$attributesVar] = $attributes->defaults($defaults);
        $event->setVariables($variables);
    }
}
