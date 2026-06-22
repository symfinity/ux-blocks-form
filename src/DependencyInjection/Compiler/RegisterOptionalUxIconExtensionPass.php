<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\DependencyInjection\Compiler;

use Symfinity\UxBlocksForm\Twig\OptionalUxIconExtension;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class RegisterOptionalUxIconExtensionPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (class_exists(\Symfinity\UxBlocksCore\Twig\OptionalUxIconExtension::class)) {
            return;
        }

        if ($container->hasDefinition(OptionalUxIconExtension::class)) {
            return;
        }

        $container->register(OptionalUxIconExtension::class, OptionalUxIconExtension::class)
            ->addTag('twig.extension');
    }
}
