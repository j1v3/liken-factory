<?php

namespace App\Controller;

use App\Entity\SubSubMenu;
use App\Form\SubSubMenuType;
use App\Repository\SubSubMenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sub/sub/menu")
 */
class SubSubMenuController extends AbstractController
{
    /**
     * @Route("/", name="sub_sub_menu_index", methods={"GET"})
     */
    public function index(SubSubMenuRepository $subSubMenuRepository): Response
    {
        return $this->render('sub_sub_menu/index.html.twig', [
            'sub_sub_menus' => $subSubMenuRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sub_sub_menu_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $subSubMenu = new SubSubMenu();
        $form = $this->createForm(SubSubMenuType::class, $subSubMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($subSubMenu);
            $entityManager->flush();

            return $this->redirectToRoute('sub_sub_menu_index');
        }

        return $this->render('sub_sub_menu/new.html.twig', [
            'sub_sub_menu' => $subSubMenu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sub_sub_menu_show", methods={"GET"})
     */
    public function show(SubSubMenu $subSubMenu): Response
    {
        return $this->render('sub_sub_menu/show.html.twig', [
            'sub_sub_menu' => $subSubMenu,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sub_sub_menu_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SubSubMenu $subSubMenu): Response
    {
        $form = $this->createForm(SubSubMenuType::class, $subSubMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sub_sub_menu_index');
        }

        return $this->render('sub_sub_menu/edit.html.twig', [
            'sub_sub_menu' => $subSubMenu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sub_sub_menu_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SubSubMenu $subSubMenu): Response
    {
        if ($this->isCsrfTokenValid('delete'.$subSubMenu->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($subSubMenu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sub_sub_menu_index');
    }
}
