<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm;

use Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\TwigConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

final class SymfinityUxBlocksFormBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getContainerExtension(): ExtensionInterface
    {
        return new DependencyInjection\SymfinityUxBlocksFormExtension();
    }

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
        $container->setParameter('ux_blocks_form.package_dir', $this->getPath());
    }

    public function configureRoutes(RoutingConfigurator $routes): void
    {
        // No public HTTP routes — form components render in application templates.
    }

    public function configureTwig(TwigConfigurator $configurator): void
    {
        $configurator->path($this->getPath() . '/templates', 'UxBlocksForm');
    }
}
