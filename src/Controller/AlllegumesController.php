<?php

namespace App\Controller;

use App\Entity\Alllegumes;
use App\Form\AlllegumesType;
use App\Repository\AlllegumesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/alllegumes")
 */
class AlllegumesController extends AbstractController
{
    /**
     * @Route("/", name="alllegumes_index", methods={"GET"})
     */
    public function index(AlllegumesRepository $alllegumesRepository): Response
    {
        $legume = $alllegumesRepository->findAll();
        return $this->render('alllegumes/index.html.twig', [
            'alllegumes' => $legume,
        ]);
    }

    /**
     * @Route("/new", name="alllegumes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $alllegume = new Alllegumes();
        $form = $this->createForm(AlllegumesType::class, $alllegume);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($alllegume);
            $entityManager->flush();

            return $this->redirectToRoute('alllegumes_index');
        }

        return $this->render('alllegumes/new.html.twig', [
            'alllegume' => $alllegume,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="alllegumes_show", methods={"GET"})
     */
    public function show(Alllegumes $alllegume): Response
    {
        return $this->render('alllegumes/show.html.twig', [
            'alllegume' => $alllegume,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="alllegumes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Alllegumes $alllegume): Response
    {
        $form = $this->createForm(AlllegumesType::class, $alllegume);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('alllegumes_index');
        }

        return $this->render('alllegumes/edit.html.twig', [
            'alllegume' => $alllegume,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="alllegumes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Alllegumes $alllegume): Response
    {
        if ($this->isCsrfTokenValid('delete'.$alllegume->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($alllegume);
            $entityManager->flush();
        }

        return $this->redirectToRoute('alllegumes_index');
    }
}
