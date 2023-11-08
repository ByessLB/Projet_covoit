<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(ReservationRepository $ar): Response
    {
        return $this->render('reservation/index.html.twig',
        [
            'reservation'       => $ar -> findAll(),
        ]);
    }

    #[Route('reservation/{id}', name: 'app_resa')]
    public function reservation(ReservationRepository $ar, $id): Response
    {
        $reservation = $ar -> find($id);
        return $this -> render('reservation/reservation.html.twig',
        [
            'resa'          => $reservation,
        ]);
    }

    #[Route('modifreservation/{id}', name: 'modif_resa')]
    #[Route('creereservation', name: 'cree_resa')]
    public function creermodifier(Reservation $reservation = null, Request $req, EntityManagerInterface $em, $id = null): Response
    {
        if (!$reservation)
        {
            $reservation = new Reservation();
        }
        $form = $this -> createForm(ReservationType::class, $reservation);
        $form -> handleRequest($req);
        if ($form   -> isSubmitted() && $form -> isValid())
        {
            $em     -> persist($reservation);
            $em     -> flush();
            $this   -> addFlash("Success", "Modification effectuée");
            return $this -> redirectToRoute('app_reservation');
        }
        return $this -> render('reservation/formulaire.html.twig',
        [
            'resa'          => $reservation,
            'monform'       => $form -> createView(),
        ]);
    }

    #[Route('supprimereservation/{id}', name: 'supprime_reservation')]
    public function supprimer(Reservation $reservation, EntityManagerInterface $em, $id): Response
    {
        $em -> remove($reservation);
        $em -> flush();
        $this -> addFlash("Success", "Modification effectuée");
        return $this -> redirectToRoute('app_reservation');
    }
}
