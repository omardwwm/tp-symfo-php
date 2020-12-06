<?php

namespace App\Controller;

use App\Entity\Mois;
use App\Form\MoisType;
use App\Repository\MoisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mois")
 */
class MoisController extends AbstractController
{
    /**
     * @Route("/", name="mois_index", methods={"GET"})
     */
    public function index(MoisRepository $moisRepository): Response
    {
        return $this->render('mois/index.html.twig', [
            'mois' => $moisRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="mois_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $moi = new Mois();
        $form = $this->createForm(MoisType::class, $moi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($moi);
            $entityManager->flush();

            return $this->redirectToRoute('mois_index');
        }

        return $this->render('mois/new.html.twig', [
            'moi' => $moi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mois_show", methods={"GET"})
     */
    public function show(Mois $moi): Response
    {
        return $this->render('mois/show.html.twig', [
            'moi' => $moi,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="mois_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Mois $moi): Response
    {
        $form = $this->createForm(MoisType::class, $moi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mois_index');
        }

        return $this->render('mois/edit.html.twig', [
            'moi' => $moi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mois_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Mois $moi): Response
    {
        if ($this->isCsrfTokenValid('delete'.$moi->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($moi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('mois_index');
    }
}
