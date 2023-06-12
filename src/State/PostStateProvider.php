<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Dto\GetPostDto;

class PostStateProvider implements ProviderInterface
{
    public function __construct(private ProviderInterface $itemProvider)
    {
    }
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $post = $this->itemProvider->provide($operation, $uriVariables, $context);
        // dd($post);
        return new GetPostDto(
            $post->getId(),
            $post->getTitle()
        );
    }
}
