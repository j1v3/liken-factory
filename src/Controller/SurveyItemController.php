<?php

namespace App\Controller;

use App\Entity\SurveyItem;
use App\Form\SurveyItemType;
use App\Repository\SurveyItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/survey/item")
 */
class SurveyItemController extends AbstractController
{
    /**
     * @Route("/", name="survey_item_index", methods={"GET"})
     */
    public function index(SurveyItemRepository $surveyItemRepository): Response
    {
        return $this->render('survey_item/index.html.twig', [
            'survey_items' => $surveyItemRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="survey_item_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $surveyItem = new SurveyItem();
        $form = $this->createForm(SurveyItemType::class, $surveyItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($surveyItem);
            $entityManager->flush();

            return $this->redirectToRoute('survey_item_index');
        }

        return $this->render('survey_item/new.html.twig', [
            'survey_item' => $surveyItem,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="survey_item_show", methods={"GET"})
     */
    public function show(SurveyItem $surveyItem): Response
    {
        return $this->render('survey_item/show.html.twig', [
            'survey_item' => $surveyItem,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="survey_item_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SurveyItem $surveyItem): Response
    {
        $form = $this->createForm(SurveyItemType::class, $surveyItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('survey_item_index');
        }

        return $this->render('survey_item/edit.html.twig', [
            'survey_item' => $surveyItem,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="survey_item_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SurveyItem $surveyItem): Response
    {
        if ($this->isCsrfTokenValid('delete'.$surveyItem->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($surveyItem);
            $entityManager->flush();
        }

        return $this->redirectToRoute('survey_item_index');
    }
}
