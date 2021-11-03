<?php

namespace App\Controller;
use App\Entity\Depute;
use App\Form\DeputeType;
use App\Entity\Assistant;
use App\Entity\Conseiller;
use App\Repository\DeputeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/depute")
 */
class DeputeController extends AbstractController
{
    /**
     * @Route("/", name="depute_index", methods={"GET"})
     */
    public function index(DeputeRepository $deputeRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'User tried to access a page without having ROLE_ADMIN');
        return $this->render('depute/index.html.twig', [
            'deputes' => $deputeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="depute_new", methods={"GET","POST"},requirements={"id":"\d+"})
     */
    public function new(Request $request): Response
    {
        $depute = new Depute();
        $form = $this->createForm(DeputeType::class, $depute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($depute);
            $entityManager->flush();

            return $this->redirectToRoute('depute_index');
        }

        return $this->render('depute/new.html.twig', [
            'depute' => $depute,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="depute_show", methods={"GET"})
     */
    public function show(Depute $depute ): Response
    {
        return $this->render('depute/show.html.twig', [
            'depute' => $depute,
            'assistants'=> $depute-> getAssistant(),
            
           
        ]);
    }

    /**
     * @Route("/{id}/edit", name="depute_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Depute $depute): Response
    {
        $form = $this->createForm(DeputeType::class, $depute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('depute_index');
        }

        return $this->render('depute/edit.html.twig', [
            'depute' => $depute,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="depute_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Depute $depute): Response
    {
        if ($this->isCsrfTokenValid('delete'.$depute->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($depute);
            $entityManager->flush();
        }

        return $this->redirectToRoute('depute_index');
    }

     
    
}
