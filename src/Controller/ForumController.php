<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ForumController extends AbstractController
{
    #[Route('/forum', name: 'app_forum')]
    public function index(PostRepository $nainDeJardinrepository): Response
    {
        $nainDeJardin = $nainDeJardinrepository->findall();
        return $this->render('forum/index.html.twig', [
            'nains' => $nainDeJardin,
        ]);
    }
}
