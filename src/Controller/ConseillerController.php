<?php

namespace App\Controller;

use App\Entity\Conseiller;
use App\Form\ConseillerType;
use App\Repository\ConseillerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/conseiller")
 */
class ConseillerController extends AbstractController
{
    /**
     * @Route("/", name="conseiller_index", methods={"GET"})
     */
    public function index(ConseillerRepository $conseillerRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'User tried to access a page without having ROLE_ADMIN');
        return $this->render('conseiller/index.html.twig', [
            'conseillers' => $conseillerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="conseiller_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $conseiller = new Conseiller();
        $form = $this->createForm(ConseillerType::class, $conseiller);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($conseiller);
            $entityManager->flush();

            return $this->redirectToRoute('conseiller_index');
        }

        return $this->render('conseiller/new.html.twig', [
            'conseiller' => $conseiller,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="conseiller_show", methods={"GET"})
     */
    public function show(Conseiller $conseiller): Response
    {
        return $this->render('conseiller/show.html.twig', [
            'conseiller' => $conseiller,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="conseiller_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Conseiller $conseiller): Response
    {
        $form = $this->createForm(ConseillerType::class, $conseiller);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('conseiller_index');
        }

        return $this->render('conseiller/edit.html.twig', [
            'conseiller' => $conseiller,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="conseiller_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Conseiller $conseiller): Response
    {
        if ($this->isCsrfTokenValid('delete'.$conseiller->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($conseiller);
            $entityManager->flush();
        }

        return $this->redirectToRoute('conseiller_index');
    }
}
