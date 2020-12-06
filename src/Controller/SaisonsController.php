<?php

namespace App\Controller;

use App\Entity\Saisons;
use App\Form\SaisonsType;
use App\Repository\SaisonsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/saisons")
 */
class SaisonsController extends AbstractController
{
    /**
     * @Route("/", name="saisons_index", methods={"GET"})
     */
    public function index(SaisonsRepository $saisonsRepository): Response
    {
        return $this->render('saisons/index.html.twig', [
            'saisons' => $saisonsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="saisons_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $saison = new Saisons();
        $form = $this->createForm(SaisonsType::class, $saison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($saison);
            $entityManager->flush();

            return $this->redirectToRoute('saisons_index');
        }

        return $this->render('saisons/new.html.twig', [
            'saison' => $saison,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="saisons_show", methods={"GET"})
     */
    public function show(Saisons $saison): Response
    {
        return $this->render('saisons/show.html.twig', [
            'saison' => $saison,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="saisons_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Saisons $saison): Response
    {
        $form = $this->createForm(SaisonsType::class, $saison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('saisons_index');
        }

        return $this->render('saisons/edit.html.twig', [
            'saison' => $saison,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="saisons_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Saisons $saison): Response
    {
        if ($this->isCsrfTokenValid('delete'.$saison->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($saison);
            $entityManager->flush();
        }

        return $this->redirectToRoute('saisons_index');
    }
}
