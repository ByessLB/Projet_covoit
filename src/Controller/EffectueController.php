<?php

namespace App\Controller;

use App\Entity\Effectue;
use App\Form\EffectueType;
use App\Repository\EffectueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EffectueController extends AbstractController
{
    #[Route('/effectue', name: 'app_effectue')]
    public function index(EffectueRepository $ar): Response
    {
        return $this->render('effectue/index.html.twig', 
        [
            'effectues'              => $ar -> findAll()
        ]);
    }

    #[Route('effectue/{id}', name:'app_effec')]
    public function effectue(EffectueRepository $ar, $id): Response
    {
        $effectue = $ar -> find($id);
        return $this    -> render('effectue/effectue.html.twig',
        [
            'efffectue'              => $effectue
        ]);
    }

    #[Route('modifeffectue/{id}', name: 'modif_effectue')]
    #[Route('createeffectue', name: 'create_effectue')]
    public function creermodifier(Effectue $effectue = null, Request $req, EntityManagerInterface $em, $id = null): Response
    {
        if(!$effectue)
        {
            $effectue = new Effectue();
        }
        $form = $this -> createForm(EffectueType::class, $effectue);
        $form -> handleRequest($req);
        if ($form -> isSubmitted() && $form -> isValid())
        {
            $em         -> persist($effectue);
            $em         -> flush();
            $this       -> addFlash("Success", "Modification effectuée");
            return $this -> redirectToRoute('app_effectue');
        }
        return $this    -> render('effectue/formulaire.html.twig',
        [
            'effectue'      => $effectue,
            "monform"       => $form -> createView()
        ]);
    }

    #[Route('supprimeeffectue/{id}', name: 'supprime_effectue')]
    public function supprimer(Effectue $effectue, EntityManagerInterface $em, $id) : Response
    {
        $em -> remove($effectue);
        $em -> flush();
        $this -> addFlash("Success", "modificaiton effectuée");
        return $this -> redirectToRoute('app_effectue');
    }
}
