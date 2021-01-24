<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private $menuRepository;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    /**
     * @Route("/", name="app_homepage")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/nav", name="app_navigation")
     */
    public function navigation(): Response
    {
        $menu = new Menu();
        $nav = [];

        $menus = $this->menuRepository->findAll();

            foreach ($menus as $item)
            {
                array_push($nav, $item->getNavigation()); 
            }

        return $this->render('main/navigation.html.twig', [
            'navigation' => $nav,
        ]);
    }
}
