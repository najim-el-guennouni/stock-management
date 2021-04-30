<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\Category;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
     /**
      * @Route(
      *     "/{_locale}/admin",name="admin")
      */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Stock Management');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Category', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Product', 'fas fa-clipboard-list', Product::class);
        if($this->isGranted('ROLE_ADMIN')){
            yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
        }
    }
    
}
