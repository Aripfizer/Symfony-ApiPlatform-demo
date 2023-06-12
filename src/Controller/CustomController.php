<?php

namespace App\Controller;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[ApiResource(
    // operations: [
    //     new Get(
    //         path
            
    //     ),
        
    // ]
    
)]
// #[Route('/api', name: 'ct_api_')]
class CustomController extends AbstractController
{
    #[Route('/custom', name: 'app_custom', methods: "GET")]
    public function index(): JsonResponse
    {
        return new JsonResponse([
            'message' => 'welcome to your new controller!',
            'path' => 'src/Controller/CustomController.php',
        ]);
    }
}
