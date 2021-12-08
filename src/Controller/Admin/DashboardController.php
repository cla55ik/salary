<?php

namespace App\Controller\Admin;

use App\Entity\Company;
use App\Entity\Contract;
use App\Entity\Employees;
use App\Entity\MoneyMove;
use App\Entity\MoneyMoveType;
use App\Entity\Purpose;
use App\Entity\Salary;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Salary');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Company', 'fas fa-list', Company::class);
        yield MenuItem::linkToCrud('Employees', 'fas fa-list', Employees::class);
        yield MenuItem::linkToCrud('Money', 'fas fa-list', MoneyMove::class);
        yield MenuItem::linkToCrud('Salary', 'fas fa-list', Salary::class);
        yield MenuItem::linkToCrud('Contract', 'fas fa-list', Contract::class);
        yield MenuItem::linkToCrud('Purpose', 'fas fa-list', Purpose::class);
    }

    public function configureCrud(): Crud
    {
        return  Crud::new()
            ->setPaginatorPageSize(30);
    }
}
