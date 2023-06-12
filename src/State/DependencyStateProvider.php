<?php

namespace App\State;

use Ramsey\Uuid\Uuid;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Entity\Dependency;

class DependencyStateProvider implements ProviderInterface
{
    public function __construct(private string $rootPath)
    {
    }
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $path = $this->rootPath . '/composer.json';
        $json = json_decode(file_get_contents($path), true);
        $items = [];
        foreach($json['require'] as $name => $version) {
            $items[] = new Dependency(Uuid::uuid5(Uuid::NAMESPACE_URL, $name)->toString(), $name, $version);
        }
        // return new Dependency($uriVariables['id']);
        return $items;
    }
}
