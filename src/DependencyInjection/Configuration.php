<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('symfinity_ux_blocks_form');
        $root = $treeBuilder->getRootNode();

        $root
            ->children()
                ->booleanNode('fragment_ids')
                    ->info('Emit data-ui-fragment attributes from the package role registry.')
                    ->defaultFalse()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
