<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Form\PersonneType;
use App\Repository\PersonneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{
    #[Route('/personne', name: 'app_personne')]
    public function index(PersonneRepository $ar): Response
    {
        return $this->render('personne/index.html.twig', 
        [
            'personnes'          => $ar -> findAll()
        ]);
    }

    #[Route('personne/{id}', name: 'app_perso')]
    public function personne(PersonneRepository $ar, $id): Response
    {
        $personne = $ar -> find($id);
        return $this    -> render('personne/personne.html.twig', 
        [
            'personne'  => $personne
        ]);
    }

    #[Route('modifpersonne/{id}', name: 'modif_personne')]
    #[Route('creepersonne', name: 'cree_personne')]
    public function creermodifier(Personne $personne = null, Request $req, EntityManagerInterface $em, $id = null): Response
    {
        if (!$personne)
        {
            $personne = new Personne();
        }
        $form = $this -> createForm(PersonneType::class, $personne);
        $form -> handleRequest($req);
        if ($form   -> isSubmitted() && $form -> isValid())
        {
            $em     -> persist($personne);
            $em     -> flush();
            $this   -> addFlash("Success", "Modification effectuée");
            return $this -> redirectToRoute('app_personne');
        }
        return $this -> render('personne/formulaire.html.twig', 
        [
            'personne'      => $personne,
            'monform'       => $form -> createView()
        ]);
    }

    #[Route('supprimepersonne/{id}', name: 'supprime_personne')]
    public function supprimer(Personne $personne, EntityManagerInterface $em, $id) : Response
    {
        $em -> remove($personne);
        $em -> flush();
        $this -> addFlash("Success", "modificaiton effectuée");
        return $this -> redirectToRoute('app_personne');
    }
}
