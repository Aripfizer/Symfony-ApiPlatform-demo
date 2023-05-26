<?php
// api/src/Controller/CreateBookPublication.php
namespace App\Controller;

use App\Entity\Book;
use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class GetAllPostsByCategory extends AbstractController
{
    public function __construct(
        private PostRepository $pr
    ) {
    }

    public function __invoke(int $categoryId)
    {
        return $this->pr->getPostsByCategoryId($categoryId);
    }
}
