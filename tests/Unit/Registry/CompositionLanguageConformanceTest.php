<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Tests\Unit\Registry;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocks\Registry\CompositionLanguageRegistryAuditor;
use Symfinity\UxBlocks\Registry\LanguageConformance;
use Symfinity\UxBlocks\Registry\RoleLanguageDefinition;
use Symfinity\UxBlocks\Test\ConformanceAssertions;
use Symfony\Component\Yaml\Yaml;

final class CompositionLanguageConformanceTest extends TestCase
{
    use ConformanceAssertions;

    /** @return list<array<string, mixed>> */
    private static function roleRows(): array
    {
        /** @var array<string, mixed> $registry */
        $registry = Yaml::parseFile(\dirname(__DIR__, 3) . '/config/ux_roles.yaml');

        /** @var list<array<string, mixed>> $rows */
        $rows = $registry['roles'] ?? [];

        return $rows;
    }

    #[Test]
    public function everyFormRoleDefinitionIsConformant(): void
    {
        foreach (self::roleRows() as $row) {
            $def = RoleLanguageDefinition::fromRegistryRow('form', $row);
            $this->assertRoleDefinitionConformant($def);
        }
    }

    #[Test]
    public function noFormRoleIsAPerConceptCompound(): void
    {
        $roleIds = array_map(static fn (array $row): string => (string) ($row['role'] ?? ''), self::roleRows());

        $this->assertNoCompoundRoles($roleIds);
    }

    #[Test]
    public function fieldCompoundDeclaresCompositionRegions(): void
    {
        $byRole = [];
        foreach (self::roleRows() as $row) {
            $byRole[(string) ($row['role'] ?? '')] = RoleLanguageDefinition::fromRegistryRow('form', $row);
        }

        self::assertContains('header', $byRole['field']->styledParts);
        self::assertContains('footer', $byRole['field']->styledParts);
    }

    #[Test]
    public function catalogLaneAuditPassesForForm(): void
    {
        $auditor = new CompositionLanguageRegistryAuditor();
        $failures = LanguageConformance::failuresOnly($auditor->auditLane('blocks.form'));

        self::assertSame([], array_map(static fn ($v) => $v->describe(), $failures));
    }
}
