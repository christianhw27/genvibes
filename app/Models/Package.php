<?php

namespace App\Models;

class Package
{
    private string $file;

    public function __construct()
    {
        $this->file = ROOT_PATH . '/storage/packages.json';
    }

    public function all(): array
    {
        if (!file_exists($this->file)) {
            return [];
        }

        $json = file_get_contents($this->file);
        $packages = json_decode($json, true);

        return is_array($packages) ? $packages : [];
    }

    public function find(int $id): ?array
    {
        foreach ($this->all() as $package) {
            if ((int) $package['id'] === $id) {
                return $package;
            }
        }

        return null;
    }

    public function create(array $data): void
    {
        $packages = $this->all();
        $ids = array_column($packages, 'id');
        $data['id'] = empty($ids) ? 1 : max($ids) + 1;
        $packages[] = $data;
        $this->save($packages);
    }

    public function update(int $id, array $data): void
    {
        $packages = array_map(function (array $package) use ($id, $data): array {
            if ((int) $package['id'] === $id) {
                $data['id'] = $id;
                return $data;
            }

            return $package;
        }, $this->all());

        $this->save($packages);
    }

    public function delete(int $id): void
    {
        $packages = array_values(array_filter($this->all(), fn (array $package): bool => (int) $package['id'] !== $id));
        $this->save($packages);
    }

    private function save(array $packages): void
    {
        file_put_contents($this->file, json_encode($packages, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}
