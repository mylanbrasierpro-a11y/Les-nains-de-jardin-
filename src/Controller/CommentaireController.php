<?php

namespace App\Controller;

use App\Form\CommentaireType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class CommentaireController extends AbstractController
{
    #[Route('/commentaire', name: 'app_commentaire')]
    public function index(): Response
    {
        if (!$commentaire) {
            $commentaire = new commentaire;
        }

        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentaire->setUser($security->getUser());
            $commentaire->setnain($nain);

            $entityManager->persist($commentaire);
            $entityManager->flush();

            return $this->redirectToRoute('app_detail', ['id' => $nain->getId()]);
        }

        $nain = $nainRepository->findOneBy(['id' => $nain->getId()]);
        return $this->render('detail/index.html.twig', [
            'nain' => $nain,
            'Commentaire' => $form->createView(),
        ]);
        return $this->render('commentaire/index.html.twig', [
            'controller_name' => 'CommentaireController',
        ]);
    }
}
