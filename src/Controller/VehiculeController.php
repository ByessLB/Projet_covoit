<?php

namespace App\Controller;

use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Repository\VehiculeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehiculeController extends AbstractController
{
    #[Route('vehicule', name: 'app_vehicules')]
    public function index(VehiculeRepository $ar): Response
    {
        return $this->render('vehicule/index.html.twig', [
            'vehicules'         => $ar -> findAll(),
        ]);
    }

    #[Route('vehicule/{id}', name: 'app_vehicule')]
    public function vehicule(VehiculeRepository $ar, $id) : Response
    {
        $vehicule = $ar -> find($id);
        return $this    -> render('vehicule/vehicule.html.twig',
        [
            'vehicule'  => $vehicule
        ]);
    }

    #[Route('modifvehicule/{id}', name: 'modif_vehicule')]
    #[Route('creevehicule', name: 'cree_vehicule')]
    public function formulaire(Vehicule $vehicule = null, Request $req, EntityManagerInterface $em, $id = null): Response
    {
        if (!$vehicule) {$vehicule = new Vehicule();}

        $form = $this -> createForm(VehiculeType::class, $vehicule);
        $form -> handleRequest($req);
        if ($form   -> isSubmitted() && $form -> isValid())
        {
            $em     -> persist($vehicule);
            $em     -> flush();
            $this   -> addFlash("Success", "Modification effectuée");
            return $this -> redirectToRoute('app_vehicules');
        }
        return $this -> render('vehicule/formulaire.html.twig',
        [
            'vehicule'          => $vehicule,
            'monform'              => $form -> createView(),
        ]);
    }

    #[Route('supprimevehicule/{id}', name: 'supprime_vehicule')]
    public function supprimer(Vehicule $vehicule, EntityManagerInterface $em, $id): Response
    {
        $em -> remove($vehicule);
        $em -> flush();
        $this -> addFlash("Suppression réussie", "Le véhicule a bien été supprimé.");
        return $this -> redirectToRoute('app_vehicules');
    }
}
