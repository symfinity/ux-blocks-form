<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Registry;

final class UxRoleRegistry
{
    private FormRoleCatalog $catalog;

    public function __construct(string $yamlPath)
    {
        $this->catalog = FormRoleCatalog::fromYamlFile($yamlPath);
    }

    public function findByTwigComponent(string $twigComponent): ?FormRoleRecord
    {
        return $this->catalog->findByTwigComponent($twigComponent);
    }

    public function roleCount(): int
    {
        return $this->catalog->roleCount();
    }

    /**
     * @return list<string>
     */
    public function rootTwigComponents(): array
    {
        return array_map(static fn (FormRoleRecord $role) => $role->twigComponent, $this->catalog->roles);
    }

    /**
     * @return list<FormRoleRecord>
     */
    public function roles(): array
    {
        return $this->catalog->roles;
    }
}
