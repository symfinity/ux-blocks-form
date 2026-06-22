<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Registry;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocks\Registry\FormRoleCatalog;
use Symfony\Component\Yaml\Yaml;

final class UxRolesYamlConsistencyTest extends TestCase
{
    #[Test]
    public function yamlSchemaMatchesContract(): void
    {
        $registry = Yaml::parseFile(\dirname(__DIR__, 3) . '/config/ux_roles.yaml');

        self::assertSame('1.4', $registry['ux_role_registry']);
        self::assertSame('blocks', $registry['registry_prefix']);
        self::assertCount(17, $registry['roles']);
        self::assertSame(FormRoleCatalog::roles(), array_column($registry['roles'], 'role'));
    }

    #[Test]
    public function everyRoleDeclaresFormCategory(): void
    {
        $registry = Yaml::parseFile(\dirname(__DIR__, 3) . '/config/ux_roles.yaml');

        foreach ($registry['roles'] as $row) {
            self::assertSame('form', $row['category'] ?? null, (string) ($row['role'] ?? ''));
        }
    }
}
