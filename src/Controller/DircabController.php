<?php

namespace App\Controller;

use App\Entity\Dircab;
use App\Form\DircabType;
use App\Repository\DircabRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dircab")
 */
class DircabController extends AbstractController
{
    /**
     * @Route("/", name="dircab_index", methods={"GET"})
     */
    public function index(DircabRepository $dircabRepository): Response
    {
        return $this->render('dircab/index.html.twig', [
            'dircabs' => $dircabRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="dircab_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dircab = new Dircab();
        $form = $this->createForm(DircabType::class, $dircab);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dircab);
            $entityManager->flush();

            return $this->redirectToRoute('dircab_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dircab/new.html.twig', [
            'dircab' => $dircab,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dircab_show", methods={"GET"})
     */
    public function show(Dircab $dircab): Response
    {
        return $this->render('dircab/show.html.twig', [
            'dircab' => $dircab,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="dircab_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Dircab $dircab): Response
    {
        $form = $this->createForm(DircabType::class, $dircab);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dircab_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dircab/edit.html.twig', [
            'dircab' => $dircab,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dircab_delete", methods={"POST"})
     */
    public function delete(Request $request, Dircab $dircab): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dircab->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dircab);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dircab_index', [], Response::HTTP_SEE_OTHER);
    }
}
