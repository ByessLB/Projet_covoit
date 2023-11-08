<?php

namespace App\Controller;

use App\Entity\Trajet;
use App\Form\TrajetType;
use App\Repository\TrajetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrajetController extends AbstractController
{
    #[Route('/trajet', name: 'app_trajets')]
    public function index(TrajetRepository $ar): Response
    {
        return $this->render('trajet/index.html.twig', [
            'trajets'       => $ar -> findAll(),
        ]);
    }

    #[Route('trajet/{id}', name:'app_trajet')]
    public function trajet(TrajetRepository $ar, $id): Response
    {
        $trajet = $ar -> find($id);
        return $this  -> render('trajet/trajet.html.twig', 
        [
            'trajet'        => $trajet,
        ]);
    }

    #[Route('modiftrajet/{id}', name: 'modif_trajet')]
    #[Route('creetrajet', name:'cree_trajet')]
    public function creermodifier(Trajet $trajet = null, Request $req, EntityManagerInterface $em, $id = null): Response
    {
        if (!$trajet)
        {
            $trajet = new Trajet();
        }

        $form = $this -> createForm(TrajetType::class, $trajet);
        $form -> handleRequest($req);
        if ($form -> isSubmitted() && $form -> isValid())
        {
            $em -> persist($trajet);
            $em -> flush();
            $this -> addFlash("Success", "Modification effectuée");
            return $this -> redirectToRoute('app_trajets');
        }
        return $this -> render('trajet/formulaire.html.twig',
        [
            'trajet'        => $trajet,
            'monform'       => $form -> createView(),
        ]);
    }

    #[Route('supprimetrajet/{id}', name: 'supprime_trajet')]
    public function supprimer(Trajet $trajet, EntityManagerInterface $em, $id): Response
    {
        $em -> remove($trajet);
        $em -> flush();
        $this -> addFlash("Success", "Modification effectuée");
        return $this -> redirectToRoute('app_trajets');
    }
}
