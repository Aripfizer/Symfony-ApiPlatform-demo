<?php

namespace App\Dto;

final class GetPostDto
{
    private ?int $id = null;

    private ?string $title = null;

    public function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }
}
