<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Registry;

use Symfinity\UxBlocks\Registry\RegistrySchema;
use Symfony\Component\Yaml\Yaml;

final class FormRoleCatalog
{
    /**
     * @param list<FormRoleRecord> $roles
     */
    public function __construct(
        public string $schemaVersion,
        public string $registryPrefix,
        public array $roles,
    ) {
    }

    public static function fromYamlFile(string $path): self
    {
        if (!is_file($path)) {
            throw new \InvalidArgumentException(sprintf('Registry YAML not found: %s', $path));
        }

        /** @var array<string, mixed> $data */
        $data = Yaml::parseFile($path);

        $schemaVersion = self::stringField($data, 'ux_role_registry');
        $registryPrefix = self::stringField($data, 'registry_prefix', RegistrySchema::DEFAULT_PREFIX);

        $roles = [];
        $roleRows = $data['roles'] ?? [];
        if (!\is_array($roleRows)) {
            $roleRows = [];
        }

        foreach ($roleRows as $row) {
            if (!\is_array($row)) {
                continue;
            }

            /** @var array<string, mixed> $row */
            $role = self::stringField($row, 'role');
            if ('' === $role) {
                continue;
            }

            $roles[] = new FormRoleRecord(
                role: $role,
                twigComponent: self::stringField($row, 'twig_component'),
                fragmentId: self::stringField($row, 'fragment_id', RegistrySchema::fragmentId($role, $registryPrefix)),
                interaction: self::stringField($row, 'interaction', 'nat'),
                status: self::stringField($row, 'status', 'shipped'),
            );
        }

        return new self($schemaVersion, $registryPrefix, $roles);
    }

    /**
     * @param array<string, mixed> $data
     */
    private static function stringField(array $data, string $key, string $default = ''): string
    {
        $value = $data[$key] ?? $default;

        return \is_string($value) ? $value : $default;
    }

    public function findByTwigComponent(string $twigComponent): ?FormRoleRecord
    {
        foreach ($this->roles as $role) {
            if ($role->twigComponent === $twigComponent) {
                return $role;
            }
        }

        return null;
    }

    public function roleCount(): int
    {
        return \count($this->roles);
    }
}
