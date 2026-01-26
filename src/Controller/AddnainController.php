<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\AddnainType;
use App\Controller\AddnainController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class AddnainController extends AbstractController
{
    #[Route('/addnain', name: 'app_addnain')]
    public function addArticle(Request $request, EntityManagerInterface $entityManager): Response
    {
        $nain = new Post();

        $form = $this->createForm(AddnainType::class, $nain);

        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){

            $entityManager->persist($nain);

            $entityManager->flush();

            $this->addFlash('success', 'Article a ajouté avec succés !');

            return $this->redirectToRoute('app_accueil');
}
        return $this->render('addnain/index.html.twig', [
            'addnain' =>$form->createView(),
        ]);
    }
}
