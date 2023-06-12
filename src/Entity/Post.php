<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Link;
use ApiPlatform\Metadata\Post as MetadataPost;
use ApiPlatform\Metadata\Put;
use App\Controller\CreatePost;
use App\Controller\CreatePostPublication;
use App\Controller\GetAllPostsByCategory;
use App\Controller\PostPublishController;
use App\Dto\GetPostDto;
use App\Repository\PostRepository;
use App\State\PostStateProvider;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: PostRepository::class)]
#[
    ApiResource(
        operations: [
            new Get(output: GetPostDto::class, provider: PostStateProvider::class),
            new GetCollection(),
        ]
    ),
    ApiFilter(
        SearchFilter::class,
        properties: [
            'title' => SearchFilter::STRATEGY_PARTIAL
        ]
    )
]
// #[GetCollection()]
// #[GetCollection(
//     security: "is_granted(ROLE_USER)",
//     uriTemplate: '/category/{categoryId}/posts',
//     uriVariables: [
//         'categoryId' => new Link(fromClass: Category::class, toProperty: 'category'),
//     ],
//     controller: GetAllPostsByCategory::class,
// )]

// #[MetadataPost(
//     uriTemplate: '/post/{postId}/publish',
//     controller: CreatePostPublication::class,
// )]

class Post
{
    /** L'Id de la publication */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $content = null;

    #[ORM\Column]
    private ?bool $isActive = false;

    #[ORM\ManyToOne(inversedBy: 'posts')]
    private ?Category $category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
