<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Content;
use App\Entity\ContentType;
use App\Entity\Estimate;
use App\Entity\Image;
use App\Entity\Menu;
use App\Entity\Message;
use App\Entity\Role;
use App\Entity\SubMenu;
use App\Entity\SubSubMenu;
use App\Entity\Survey;
use App\Entity\SurveyItem;
use App\Entity\User;

class DashboardController extends AbstractDashboardController
{
    // /**
    //  * @Route("/admin", name="admin")
    //  */
    // public function index(): Response
    // {

    /**
     * @Route("/admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());

        // you can also redirect to different pages depending on the current user
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // you can also render some template to display a proper Dashboard
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Liken Factory');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Contents', 'fas fa-list', Content::class);
        yield MenuItem::linkToCrud('Content Types', 'fas fa-list', ContentType::class);
        yield MenuItem::linkToCrud('Estimatations', 'fas fa-list', Estimate::class);
        yield MenuItem::linkToCrud('Images', 'fas fa-list', Image::class);
        yield MenuItem::linkToCrud('Menus', 'fas fa-list', Menu::class);
        yield MenuItem::linkToCrud('Sub Menus', 'fas fa-list', SubMenu::class);
        yield MenuItem::linkToCrud('Sub Sub Menus', 'fas fa-list', SubSubMenu::class);
        yield MenuItem::linkToCrud('Messages', 'fas fa-list', Message::class);
        yield MenuItem::linkToCrud('Roles', 'fas fa-list', Role::class);
        yield MenuItem::linkToCrud('Surveys', 'fas fa-list', Survey::class);
        yield MenuItem::linkToCrud('Survey Items', 'fas fa-list', SurveyItem::class);
    }
}
