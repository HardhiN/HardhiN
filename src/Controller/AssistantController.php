<?php

namespace App\Controller;

use App\Entity\Assistant;
use App\Form\AssistantType;
use App\Repository\AssistantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/assistant")
 */
class AssistantController extends AbstractController
{
    /**
     * @Route("/", name="assistant_index", methods={"GET"})
     */
    public function index(AssistantRepository $assistantRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'User tried to access a page without having ROLE_ADMIN');
        return $this->render('assistant/index.html.twig', [
            'assistants' => $assistantRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="assistant_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $assistant = new Assistant();
        $form = $this->createForm(AssistantType::class, $assistant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($assistant);
            $entityManager->flush();

            return $this->redirectToRoute('assistant_index');
        }

        return $this->render('assistant/new.html.twig', [
            'assistant' => $assistant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="assistant_show", methods={"GET"})
     */
    public function show(Assistant $assistant): Response
    {
        return $this->render('assistant/show.html.twig', [
            'assistant' => $assistant,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="assistant_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Assistant $assistant): Response
    {
        $form = $this->createForm(AssistantType::class, $assistant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('assistant_index');
        }

        return $this->render('assistant/edit.html.twig', [
            'assistant' => $assistant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="assistant_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Assistant $assistant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$assistant->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($assistant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('assistant_index');
    }
}
