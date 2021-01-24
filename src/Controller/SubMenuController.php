<?php

namespace App\Controller;

use App\Entity\SubMenu;
use App\Form\SubMenuType;
use App\Repository\SubMenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sub/menu")
 */
class SubMenuController extends AbstractController
{
    /**
     * @Route("/", name="sub_menu_index", methods={"GET"})
     */
    public function index(SubMenuRepository $subMenuRepository): Response
    {
        return $this->render('sub_menu/index.html.twig', [
            'sub_menus' => $subMenuRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sub_menu_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $subMenu = new SubMenu();
        $form = $this->createForm(SubMenuType::class, $subMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($subMenu);
            $entityManager->flush();

            return $this->redirectToRoute('sub_menu_index');
        }

        return $this->render('sub_menu/new.html.twig', [
            'sub_menu' => $subMenu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sub_menu_show", methods={"GET"})
     */
    public function show(SubMenu $subMenu): Response
    {
        return $this->render('sub_menu/show.html.twig', [
            'sub_menu' => $subMenu,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sub_menu_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SubMenu $subMenu): Response
    {
        $form = $this->createForm(SubMenuType::class, $subMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sub_menu_index');
        }

        return $this->render('sub_menu/edit.html.twig', [
            'sub_menu' => $subMenu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sub_menu_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SubMenu $subMenu): Response
    {
        if ($this->isCsrfTokenValid('delete'.$subMenu->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($subMenu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sub_menu_index');
    }
}
