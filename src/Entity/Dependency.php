<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\State\DependencyStateProvider;

#[ApiResource(
    paginationEnabled: false,
    operations: [
        new GetCollection(provider: DependencyStateProvider::class),
    ]
)]
class Dependency
{
    #[ApiProperty(identifier: true, description: "L'identifiant de la dépendance")]
    private string $uuid;

    #[ApiProperty(description: "Le nom de la dépendance")]
    private string $name;

    #[ApiProperty(description: "La version de la dépendance", openapiContext: [
        'exemple' => "6.2.*"
    ])]
    private string $version;

    public function  __construct(string $uuid, string $name, string $version)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->version = $version;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getVersion()
    {
        return $this->version;
    }
}
