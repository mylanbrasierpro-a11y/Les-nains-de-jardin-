<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(PostRepository $nainDeJardinrepository): Response
    {
        $nainDeJardin = $nainDeJardinrepository->findby([], ['id'=>'DESC'],4);
        return $this->render('accueil/index.html.twig', [
            'nains' => $nainDeJardin,
        ]);
    }
}
