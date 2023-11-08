<?php

namespace App\Controller;

use App\Entity\Messagerie;
use App\Form\MessagerieType;
use App\Repository\MessagerieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessagerieController extends AbstractController
{
    #[Route('/messagerie', name: 'app_messagerie')]
    public function index(MessagerieRepository $ar): Response
    {
        return $this->render('messagerie/index.html.twig', [
            'messagerie'       => $ar -> findAll(),
        ]);
    }

    #[Route('messagerie/{id}', name: 'app_mess')]
    public function messagerie(MessagerieRepository $ar, $id): Response
    {
        $messagerie = $ar -> find($id);
        return $this -> render('messagerie/messagerie.html.twig',
        [
            'mess'          => $messagerie,
        ]);
    }

    #[Route('modifmessagerie/{id}', name: 'modif_messageire')]
    #[Route('creemessagerie', name: 'cree_messagerie')]
    public function creermodifier(Messagerie $messagerie = null, Request $req, EntityManagerInterface $em, $id = null): Response
    {
        if (!$messagerie)
        {
            $messagerie = new Messagerie();
        }
        $form = $this -> createForm(MessagerieType::class, $messagerie);
        $form -> handleRequest($req);
        if ($form -> isSubmitted() && $form -> isValid());
        {
            $em -> persist($messagerie);
            $em -> flush();
            $this -> addFlash("Success", "Modification effectuée");
            return $this -> redirectToRoute('app_messagerie');
        }
        return $this -> redirectToRoute('messagerie/formulaire.html.twig',
        [
            'messagerie'=> $messagerie,
            'monform'      => $form -> createView(),
        ]);
    }

    #[Route('supprimemessagerie/{id}', name: 'supprime_messagerie')]
    public function supprimer(Messagerie $messagerie, EntityManagerInterface $em, $id): Response
    {
        $em -> remove($messagerie);
        $em -> flush();
        $this -> addFlash("Success", "Modification effectuée");
        return $this -> redirectToRoute('app_messagerie');
    }
}
