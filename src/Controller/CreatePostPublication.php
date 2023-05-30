<?php
// api/src/Controller/CreateBookPublication.php
namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class CreatePostPublication extends AbstractController
{
    public function __invoke(Post $post): Post
    {
        $post->setIsActive(true);
        return $post;
    }
}
